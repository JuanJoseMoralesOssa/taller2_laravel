<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <?php
    require_once '../vendor/autoload.php';

    use Taller2\Controllers\ProductController;

    $productController = new ProductController();
    $data =
        json_decode(file_get_contents(('products.json')), true);

    ?>

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

            <div class="flex justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">My products</h2>
                <a href="load.php" class="text-blue-500 bg-blue-50 rounded p-2 hover:underline">Load inventory</a>
                <a href="getTotal.php" class="text-blue-500 bg-blue-50 rounded p-2 hover:underline">Calculate total inventory</a>
                <a href="add.php" class="text-blue-500 bg-blue-50 rounded p-2 hover:underline">Create new product</a>
                <a href="makepdf.php" class="text-blue-500 bg-blue-50 rounded p-2 hover:underline">Create new pdf</a>
            </div>


            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                <?php foreach ($data as $product) : ?>
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="<?php echo ($product['image'] ?? '') ?>" alt="<?php echo ($product['title'] ?? '') ?>" class="w-full h-full object-center object-cover">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="<?php echo ($product['image'] ?? '') ?>">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        <?php echo ($product['title'] ?? ' ') ?>
                                    </a>
                                </h3>
                            </div>
                            <p class="text-sm font-medium text-gray-900">$<?php echo ($product['price'] ?? '') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>


</body>

</html>
