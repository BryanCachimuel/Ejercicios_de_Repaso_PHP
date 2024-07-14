<?php

require_once 'app/config.php';

/* Insertar un concepto directamente en el array */
$_SESSION['new_quote']['items'] = [
    [
        'id' => 1234,
        'concept' => 'Playera Negra',
        'type' => 'producto',
        'quantity' => 2,
        'price' => 100.55,
        'taxes' => (TAXES_RATE / 100) * (100.55 * 2),
        'total' => (100.55 * 2) + ((TAXES_RATE / 100) * (100.55 * 2))
    ],
    [
        'id' => 1235,
        'concept' => 'Control de PS4 ',
        'type' => 'producto',
        'quantity' => 3,
        'price' => 750.99,
        'taxes' => (TAXES_RATE / 100) * (750.99 * 3),
        'total' => (750.99 * 3) + ((TAXES_RATE / 100) * (750 * 3))
    ],
];

/* Renderizado de la vista */
get_view('index.php');