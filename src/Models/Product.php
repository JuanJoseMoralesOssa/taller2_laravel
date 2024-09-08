<?php

namespace Taller2\Models;

class Product
{

    public $image;
    public $title;
    public $price;

    public function __construct($image, $title, $price)
    {
        $this->image = $image;
        $this->title = $title;
        $this->price = $price;
    }

    public function getImege()
    {
        return $this->image;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setImege($image)
    {
        $this->image = $image;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function to_array()
    {
        return [
            'image' => $this->image,
            'title' => $this->title,
            'price' => $this->price
        ];
    }
}
