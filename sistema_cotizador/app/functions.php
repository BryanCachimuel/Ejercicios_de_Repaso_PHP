<?php

use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;

function get_view($view_name){
    $view = VIEWS.$view_name;
    // en caso de no existir la vista
    if(!is_file($view_name)){
        die('La vista no existe');
    }
    // Existe la vista
    require_once $view;
}

function get_quote(){
    if(!isset($_SESSION['new_quote'])){
        return $_SESSION['new_quote'] = [
            'number' => rand(111111, 999999),
            'name' => '',
            'company' => '',
            'email' => '',
            'items' => [],
            'subtotal' => 0,
            'taxes' => 0,
            'shipping' => 0,
            'total' => 0
        ];
    }
    recalculate_quote();

    return $_SESSION['new_quote'];
}

function set_client($client){
    $_SESSION['new_quote']['name'] = trim($client['nombre']);
    $_SESSION['new_quote']['company'] = trim($client['empresa']);
    $_SESSION['new_quote']['email'] = trim($client['email']);
    return true;
}

function recalculate_quote(){
    $items = [];
    $subtotal = 0;
    $taxes = 0;
    $shipping = SHIPPING;
    $total = 0;

    if(!isset($_SESSION['new_quote'])){
        return false;
    }

    // validar items
    $items = $_SESSION['new_quote']['items'];

    // Si la lista de items está vacia no es necesario calcular nada 
    if(!empty($items)){
        foreach($items as $item){
            $subtotal += $item['total'];
            $taxes += $item['taxes'];
        }
    }

    $total = $subtotal + $taxes + $shipping;

    $_SESSION['new_quote']['subtotal'] = $subtotal;
    $_SESSION['new_quote']['taxes'] = $taxes;
    $_SESSION['new_quote']['shipping'] = $shipping;
    $_SESSION['new_quote']['total'] = $total;

    return true;
}

/* función para reasignar valores */
function restart_quote(){
    $_SESSION['new_quote'] = [
        'number' => rand(111111, 999999),
        'name' => '',
        'company' => '',
        'email' => '',
        'items' => [],
        'subtotal' => 0,
        'taxes' => 0,
        'shipping' => 0,
        'total' => 0
    ];

    return true;
}

function get_items(){
    $items = [];
    
    // si no existe la cotización y obviamente está vacio el array
    if(!isset($_SESSION['new_quote']['items'])){
        return $items;
    }

    // la cotización existe, se asigna el valor
    $items = $_SESSION['new_quote']['items'];
    return $items;
}

function get_item($id){
    $items = get_items();

    // si no hay items
    if(empty($items)){
        return false;
    }

    // si hay items iteramos
    foreach($items as $item){
        // validar si existe con el mismo id pasado
        if($item['id'] === $id){
            return $item;
        }
    }
    // no hubo un match o resultados
    return false;
}

function delete_items(){
    $_SESSION['new_quote']['items'] = [];
    recalculate_quote();
    return true;
}

function delete_item($id){
    $items = get_items();

    // si no hay items
    if(empty($items)){
        return false;
    }

    // si hay items iteramos
    foreach($items as $i => $item){
        // validar si existe con el mismo id pasado
        if($item['id'] === $id){
            unset($_SESSION['new_quote']['items'][$i]);
            return true;
        }
    }
    // no hubo un match o resultados
    return false;
}

function add_item($item){
    $items = get_items();

    /* Si existe el id ya en nuestros items podemos
       actualizar la información en lugar de agregarlo 
    */ 
    if(get_item($item['id']) !== false){
        foreach($items as $i => $e_item){
            if($item['id'] === $e_item['id']){
                $_SESSION['new_quote']['items'][$i] = $item;
                return true;
            }
        }
    }
    // No existe en la lista, se agrega al array
    $_SESSION['new_quote']['items'][] = $item;
    return true;
}

function json_build($status = 200, $data = null, $msg = ''){
    if(empty($msg) || $msg == ''){
        switch($status){
            case 200:
                $msg = 'OK';
                break;

            case 201:
                $msg = 'Created';
                break;

            case 400:
                $msg = 'Invalid Request';
                break;
            
            case 403:
                $msg = 'Access Denied';
                break;

            case 404:
                $msg = 'Not Found';
                break;

            case 500:
                $msg = 'Internal Server Error';
                break;

            case 550:
                $msg = 'Permission Denied';
                break;

            default:
                break;
        }
    }

    $json = [
        'status' => $status,
        'data' => $data,
        'msg' => $msg
    ];

    return json_encode($json);
}

function json_output($json){
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json;charset=utf-8');

    if(is_array($json)){
        $json = json_encode($json);
    }

    echo $json;
    exit();
}

function get_module($view, $data = []){
    $view = $view.'.php';
    if(!is_file($view)){
        return false;
    }

    // conversión a objeto
    $d = $data = json_decode(json_encode($data));

    ob_start();
    require_once $view;
    $output = ob_get_clean();

    return $output;
}

function hook_mi_funcion(){
    echo "Estoy siendo ejecutada en ajax.php de forma autorizada";
}

function hook_get_quote_res(){
    /* cargar la cotización */
    $quote = get_quote();
    $html = get_module(MODULES.'quote_table', $quote);
    json_output(json_build(200, ['quote' => $quote, 'html' => $html]));
}

// Agregar Concepto
function hook_add_to_quote(){
    // validar
    if(!isset($_POST['concepto'], $_POST['tipo'], $_POST['precio_unitario'], $_POST['cantidad'])){
        json_output(json_build(403, null, 'Parámetros Incompletos'));
    }

    $concept = trim($_POST['concepto']);
    $type = trim($_POST['tipo']);
    $price = (float) str_replace([',','$'], '', $_POST['precio_unitario']);
    $quantity = (int) trim($_POST['cantidad']);
    $subtotal = $price * $quantity;
    $taxes = $subtotal * (TAXES_RATE / 100);

    $item = [
        'id' => rand(1111, 9999),
        'concept' => $concept,
        'type' => $type,
        'quantity' => $quantity,
        'price' => $price,
        'taxes' => $taxes,
        'total' => $subtotal
    ];

    if(!add_item($item)){
        json_output(json_build(400, null, 'Hubo un problema al guardar el concepto en la cotización'));
        exit;
    }
    json_output(json_build(201, get_item($item['id']), 'Concepto Agregado con Exito'));
    exit;
}

// Reiniciar la cotización
function hook_restart_quote(){
    $item = get_items();

    if(empty($items)){
        json_output(400, null, 'No es necesario reiniciar la cotización, no hay conceptos en ella');
    }   

    if(!restart_quote()){
        json_output((json_build(400, null, 'Hubo un problema al reiniciar la cotización')));
    }
    json_output(json_build(200, get_quote(), 'La cotización se ha reiniciado con exito'));
}

// Borrar un concepto de la cotización
function hook_delete_concept(){
    if(!isset($_POST['id'])){
        json_output(json_build(400, null, 'Parámetros Incompletos'));
    }

    if(!delete_item((int) $_POST['id'])){
        json_output(json_build(400, null, 'Hubo un problema al borrar el concepto'));
    }

    json_output(json_build(200, get_quote(), 'Concepto Borrado con Éxito'));
}

// Cargar un concepto para editar
function hook_edit_concept(){
    if(!isset($_POST['id'])){
        json_output(json_build(403, null, 'Parámetros Incompletos'));
    }
    if(!$item = get_item((int) $_POST['id'])){
        json_output(json_build(400, null, 'Hubo un problema al cargar el concepto'));
    }
    json_output(json_build(200, $item, 'Concepto cargado con éxito'));
}

// Guardar los cambios de un concepto
function hook_save_concept(){
    // Validar
    if(!isset($_POST['id_concepto'], $_POST['concepto'], $_POST['tipo'], $_POST['precio_unitario'], $_POST['cantidad'])){
        json_output(json_build(403, null, 'Parámetros Incompletos'));
    }

    $id = (int) $_POST['id_concepto'];
    $concept = trim($_POST['concepto']);
    $type = trim($_POST['tipo']);
    $price = (float) str_replace([',','$'], '', $_POST['precio_unitario']);
    $quantity = (int) trim($_POST['cantidad']);
    $subtotal = (float) $price * $quantity;
    $taxes = (float) $subtotal * (TAXES_RATE / 100);

    $item = [
        'id' => $id,
        'concept' => $concept,
        'type' => $type,
        'quantity' => $quantity,
        'price' => $price,
        'taxes' => $taxes,
        'total' => $subtotal
    ];

    if(!add_item($item)){
        json_output(json_build(400, null, 'Hubo un problema al guardar los cambios del concepto'));
    }
    json_output(json_build(200, get_item($id), 'Cambios guardados con éxito'));
}

// Generar un PDF
function generate_pdf($filename = null, $html, $save_to_file = true){
    $filename = $filename === null ? time().'.pdf' : $filename.'.pdf';
    // Instancia de la clase
    $pdf = new Dompdf();

    // Formato
    $pdf->setPaper('A4');

    // Contenido
    $pdf->loadHtml($html);
    $pdf->render();

    if($save_to_file){
        $output = $pdf->output();
        file_put_contents($filename, $output);
        return true;
    }

    $pdf->stream($filename);
    return true;
}

// Crear el pdf de la cotización
function hook_generate_quote(){
    // Validar
    if(!isset($_POST['nombre'], $_POST['empresa'], $_POST['email'])){
        json_output(json_build(403, null, 'Parámetros Incompletos'));
    }

    // Validar Correo
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        json_output(json_build(400, null, 'Dirección de Correo No Válida'));
    }

    // Guardar información del cliente
    $client = [
        'nombre' => $_POST['nombre'],
        'empresa' => $_POST['empresa'],
        'email' => $_POST['email']
    ];
    set_client($client);

    // cargar cotización
    $quote = get_quote();

    if(empty($quote['items'])){
        json_output(json_build(400, null, 'No hay conceptos en la cotización'));
    }

    $module = MODULES.'pdf_template';
    $html = get_module($module, $quote);
    $filename = 'coty_'.$quote['number'];
    $download = sprintf(URL.'pdf.php?number=%s',$quote['number']);
    $quote['url'] = $download;

    // Generar pdf y guardar en servidor
    if(!generate_pdf(UPLOADS.$filename, $html)){
        json_output(json_build(400,null,'Hubo un problema al generar la cotización'));
    }
    json_output(json_build(200, $quote, 'Cotización generada con éxito'));
}


// Cargar todas las cotizaciones
function get_all_quotes(){
    return $quotes = glob(UPLOADS.'coty_*.pdf');
}

// Redirección
function redirect($route){
    header(sprintf('Location: %s', $route));
    exit;
}

// Enviar nuevo correo electrónico
function send_email($data){
    $mail = new PHPMailer();
    $mail->setFrom(APP_EMAIL,APP_NAME);
    $mail->addAddress('jslocal2@localhost.com','Lennin L');
    $mail->Subject = $data['subject'];
    $mail->msgHTML(get_module(MODULES.'email_template', $data));
    $mail->AltBody = $data['alt_text'];
    $mail->CharSet = 'UTF-8';
    
    // Adjuntos
    if(!empty($data['attachments'])){
        foreach($data['attachments'] as $file){
            $mail->addAttachment($file);
        }
    }
    
    if(!$mail->send()){
        return false;
    }
    return true;
}

function hook_send_quote(){
    if(!isset($_POST['number'])){
        json_output(json_build(403, null, 'Parámetros Incompletos'));
    }

    // Validar la existencia de la cotización
    $file = sprintf(UPLOADS.'coty_%s.pdf', $number);
    if(!is_file($file)){
        json_output(json_build(400, null, 'La cotización no existe'));
    }

    // Guardar información para el correo
    $body = '<h1>Nueva cotización</h1><br>Hola <b><p>%s</b>, has recibido una cotización con folio 
             <b>%s<b/> por parte de <b>%s<b/>, se encuentra adjunta a este correo.</p>';
    $body = sprintf($body, $quote['name'], $number, APP_NAME);

    $email_data = [
        'subject' => sprintf('Cotización número %s reciba', $number),
        'alt_text' => sprintf('Nueva cotización de %s recibida', APP_NAME),
        'body' => $body,
        'name' => $quote['name'],
        'email' => $quote['email'],
        'attachments' => [$file]
    ];

    // Generar pdf y guardar en servidor
    if(!send_email($email_data)){
        json_output(json_build(400, null, 'Hubo un problema al enviar el correo'));
    }

    json_output(json_build(200, $quote, 'Cotización enviada con exito'));
}