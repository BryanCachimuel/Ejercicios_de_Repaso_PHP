<?php

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

function recalculate_quote(){
    $items = [];
    $subtotal = 0;
    $taxes = 0;
    $shipping = 0;
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

    $shipping = $_SESSION['new_quote']['shipping'];
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
    return true;
}