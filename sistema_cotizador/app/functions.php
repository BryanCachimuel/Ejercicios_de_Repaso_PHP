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