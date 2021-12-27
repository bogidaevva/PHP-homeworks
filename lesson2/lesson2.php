<?php

$items = [
            [
                'id' => 1,
                'title' => 'Flute',
                'price' => 20000,
                'img' => 'flute.jpg',
                'description' => [
                    'color' => 'white',
                    'material' => 'bamboo'
                ]
            ],
            [
                'id' => 2,
                'title' => 'Guitar',
                'price' => 18000,
                'img' => 'guitar.jpg',
                'description' => [
                    'color' => 'brown',
                    'material' => 'linden'
                ]
            ],
            [
                'id' => 3,
                'title' => 'Drum',
                'price' => 68000,
                'img' => 'drum.jpg',
                'description' => [
                    'color' => 'brown',
                    'material' => 'steel'
                ]
            ],
        ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Домашняя работа 2</title>
</head>
<body>

    <section>
        <h1>Товары</h1>
        <?php foreach ($items as $item): ?>
            <div>
                <h3> <?= $item['title'] ?> </h3>
                <p>price: <?= $item['price'] ?> </p>
                <div>
                    <h3>Описание</h3>
                        <p>color: <?= $item['description']['color'] ?> </p>
                        <p>material: <?= $item['description']['material'] ?> </p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

</body>
</html>