<?php
require_once '../vendor/autoload.php';

use Taller2\Models\Product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $products = json_decode(
        file_get_contents('products.json'),
        true
    );

    $product = new Product(
        $_POST['image'],
        $_POST['title'],
        $_POST['price']
    );
    $products[] = $product->to_array();
    file_put_contents('products.json', json_encode($products));
    header('Location: index.php');
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<form class="max-w-sm mx-auto my-20" method="POST">
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Its name</label>
        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Its price</label>
        <input type="number" step="0.01" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
    </div>
    <div class="mb-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Its image</label>
        <input type="text" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://dummyimage.com/300" value="https://dummyimage.com/300" required />
    </div>
    <button id=" add" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add</button>
</form>
