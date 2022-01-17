<?php
$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
    ],
    [
        'id' => 3,
        'title' => 'Piano',
        'price' => 68000,
    ],
    [
        'id' => 4,
        'title' => 'Drum',
        'price' => 68000,
    ],
];

//1
$prices = array_column($items, 'price');
// array_multisort($prices); // по возрастанию или как настроим, не сохраняет связь с ключом (для int)
// sort($prices); //  по возрастанию значений, связь с ключом НЕ сохраняется
asort($prices); // по возрастанию значений, связь с ключом сохраняется
// arsort($prices); // по убыванию значений, связь с ключом сохраняется
// ksort($prices); // по возрастанию ключей
// krsort($prices); // по убыванию ключей
// rsort($prices); // по убыванию значений, связь с ключом НЕ сохраняется
// shuffle($prices); // значения в случайном порядке, связь с ключом НЕ сохраняется
var_dump($prices);
// uasort($prices, функция, в соответсвии с которой сортируем); по значению в соответсвии с заданным условием, связь с ключом сохраняется
// usort(); по значению в соответсвии с заданным условием, связь с ключом НЕ сохраняется
// uksort(); по ключу в соответсвии с заданным условием, связь сохраняется

//2
usort($items, function($item1, $item2){
    if ($item1['price'] < $item2['price']) return -1;
    if ($item1['price'] > $item2['price']) return 1;
    if ($item1['price'] === $item2['price']) {
        return $item1['title'] <=> $item2['title'];
    }
});
var_dump($items);

