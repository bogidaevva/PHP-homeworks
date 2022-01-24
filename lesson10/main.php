<?php
require_once 'Item.php';
require_once 'ItemStorage.php';

// создать объекты Item (товар) и ItemStore (хранилище),
$item_1 = new Item(354, 'стол');
$item_1->setMaterial('дерево');
$item_1->setPrice(7000);

$item_2 = new Item(110, 'кровать');
$item_2->setMaterial('Дерево');
$item_2->setPrice(15000);

$item_3 = new Item(903, 'Лампа');
$item_3->setMaterial('железо');

$item_store = new ItemStorage();

// добавить товары в хранилище
$item_store->addItem($item_1);
$item_store->addItem($item_2);
$item_store->addItem($item_3);
var_dump($item_store);

// вызвать методы поиска товаров в хранилище:
    // get_by_material,
    var_dump($item_store->getByMaterial('Дерево', 'Пластик'));
    // get_by_price_and_material,
    var_dump($item_store->getByPriceAndMaterial(12000, 'Дерево'));
    // get_by_price
    var_dump($item_store->getByPrice(10000, 20000));