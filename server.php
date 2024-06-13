<?php

$todos = [
    [
        'task' => 'Compra il latte',
        'completed' => false
    ],
    [
        'task' => 'Porta fuori il cane',
        'completed' => true
    ],
    [
        'task' => 'Paga le bollette',
        'completed' => false
    ],
    [
        'task' => 'Studia PHP',
        'completed' => true
    ],
];

header('Content-Type: application/json');

$jsonString = json_encode($todos);

echo $jsonString;