<?php

class Item
{
    private $id; // не может быть отрицательным или 0
    private $title; // максимум 10 символов
    private $price; // не может быть отрицательным или 0
    private $material; // минимум 3 символа

    // свойства title и id являются обязательными,
    public function __construct(int $id, string $title)
    {
        if ($id > 0) $this->id = $id;
        if (mb_strlen($title) <= 10) $this->title = $title;
    }

    // добавить все необходимые геттеры и сеттеры
    public function setId(int $id)
    {
        if ($id <= 0) {
            throw new InvalidArgumentException('ID должен быть больше 0.');
        }
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle(string $title) 
    {
        if (mb_strlen(trim($title)) > 10) {
            throw new InvalidArgumentException('Название должно быть не более 10 символов.');
        }
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setPrice(int $price) 
    {
        if ($price <= 0) {
            throw new InvalidArgumentException('Значение цены должно быть больше 0.');
        }
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setMaterial(string $material) 
    {
        if (mb_strlen(trim($material)) < 3) {
            throw new InvalidArgumentException('Название материала должно быть не менее 3 символов.');
        }
        $this->material = $material;
    }

    public function getMaterial()
    {
        return $this->material;
    }
}