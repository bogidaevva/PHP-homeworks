<?php

return [
    [
        'path' => '/',
        'method' => 'GET',
        'controller' => 'Cakes\Controllers\IndexController::index'
    ],
    [
        'path' => '/add',
        'method' => 'POST',
        'controller' => 'Cakes\Controllers\CakesController::addNewCake'
    ],
    [
        'path' => '/cakes',
        'method' => 'GET',
        'controller' => 'Cakes\Controllers\CakesController::showAllCakes'
    ],
    [
        'path' => '/cake',
        'method' => 'GET',
        'controller' => 'Cakes\Controllers\CakesController::getCakeById'
    ],
    [
        'path' => '/search_by_price',
        'method' => 'GET',
        'controller' => 'Cakes\Controllers\CakesController::searchCakesByPrice'
    ]
];