<?php


namespace Taller2\Controllers;

use GuzzleHttp\Client;
use Taller2\Models\Product;

class ProductController
{
    public Product $products;

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }

    public function getLoadedProducts()
    {
        $dataBefore = json_decode(file_get_contents(('products.json')), true);
        $client = new Client();
        $response = $client->request('GET', 'https://api.escuelajs.co/api/v1/products?offset=0&limit=10');
        $body = $response->getBody();
        $data = json_decode($body, true);
        foreach ($data as $product) {
            $product = new Product($product['images'][0], $product['title'], $product['price']);
            $dataBefore[] = $product->to_array();
        }
        file_put_contents('products.json', json_encode($dataBefore));
        return $data;
    }

    public function getTotalPrice()
    {
        $data = json_decode(file_get_contents(('products.json')), true);
        $total = 0;
        foreach ($data as $product) {
            $total += $product['price'];
        }
        return $total;
    }

    public function getDoubleTotalPrice()
    {
        return $this->getTotalPrice() * 2;
    }
}
