<?php

require '../vendor/autoload.php';


use Taller2\Controllers\ProductController;

$productController = new ProductController();
?>

<div id="myModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col items-center justify-between border-b rounded-t gap-2">
        <h2 class="text-xl font-medium text-gray-900 dark:text-white">Products</h2>
        <p>Total inventory:</p>
        <p class="bg-yellow-300 rounded p-2">$<?php echo $productController->getTotalPrice(); ?></p>
        <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded">Regresar</a>
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
