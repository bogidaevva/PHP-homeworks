<?php


class ItemStorage
{
    private $items = [];

    // добавление товара в хранилище,
    // товары в массиве хранятся по значению id:
    // id товара => товар
    public function addItem(Item $item)
    {
        $this->items[$item->getId()] = $item;
    }

    // написать реализацию следующих методов
    public function getById(int $id)
    {
        // возвращает товар по id
        return $this->items[$id];
    }

    public function getByTitle(string $title)
    {
        // возвращает товар по названию (title)
        foreach ($this->items as $item) {
            if (strtolower($item->getTitle()) == strtolower($title)) {
                return $item;
            }
        }
    }

    public function getByPrice(int $price_from, int $price_to)
    {
        // возвращает товары, стоимость которых находится в диапазоне от $price_from до $price_to
        $items_by_price = [];
        foreach ($this->items as $item) {
            if ($item->getPrice() >= $price_from && $item->getPrice() <= $price_to) {
                $items_by_price[] = $item;
            }
        }
        return $items_by_price;
    }

    public function getByMaterial(...$materials)
    {
        // возвращает товары, которые изготовлены из материалов, перечисленных в $materials,
        // например, при вызове в метод передаются ->get_by_material('дерево', 'железо', 'пластик');
        // значит метод должен вернуть все товары, сделанные из дерева, железа или пластика
        $items_by_material = [];
        $convert_to_lowercase = function(string $e) {
            return  $e = mb_strtolower($e);
        };
        foreach ($this->items as $item) {
            if (in_array(mb_strtolower($item->getMaterial()), array_map($convert_to_lowercase, $materials))) {
                $items_by_material[] = $item;
            }
        }
        return $items_by_material;
    }

    public function getByPriceAndMaterial(int $price_to, string $material){
        // возвращает товары, стоимость которых не превышает $price_to и
        // материал, из которого изготовлен товар соответствует $material
        $items_by_price_and_material = [];
        foreach ($this->items as $item) {
            if ($item->getPrice() <= $price_to && mb_strtolower($item->getMaterial()) == mb_strtolower($material)) {
                $items_by_price_and_material[] = $item;
            }
        }
        return $items_by_price_and_material;
    }
}