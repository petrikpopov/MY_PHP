<?php
    class Category {
        public $name;
        public $list_products;

        function __construct($name, $list_products = []) {
            $this->name = $name;
            $this->list_products = $list_products;
        }

        function getCategoryName() {
            return $this->name;
        }

        function getCategoryProducts() {
            return $this->list_products;
        }

        function addNewProduct($product) {
            $this->list_products[] = $product;
        }

        function clearProducts() {
            $this->list_products = [];
        }

        public static function searchCategoryByName($categories, $category_name) {
            foreach ($categories as $category) {
                if (strtolower($category->getCategoryName()) == strtolower($category_name)) {
                    return $category;
                }
            }
            return null; 
        }
    }

    session_start(); 
    if (!isset($_SESSION['categories'])) {
        $_SESSION['categories'] = [];
    }
    $categories = &$_SESSION['categories'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['category_name']) && !empty($_POST['category_name'])) {
            $category_name = $_POST['category_name'];
            $category = new Category($category_name);

            $category->addNewProduct('Product 1');
            $category->addNewProduct('Product 2');
            $category->addNewProduct('Product 3');

            $categories[] = $category;
        }

        if (isset($_POST['category_search']) && !empty($_POST['category_search'])) {
            $category_name = $_POST['category_search'];
            $searched_category = Category::searchCategoryByName($categories, $category_name);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категорії</title>
    <style>
        .category-list {
            margin: 20px 0;
            padding: 0;
            list-style: none;
        }
        .category-list li {
            cursor: pointer;
            padding: 5px;
            background-color: #f0f0f0;
            margin: 5px 0;
        }
        .category-list li:hover {
            background-color: #e0e0e0;
        }
        .product-list {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST">
            <input name="category_name" type="text" required placeholder="Enter category name">
            <button type="submit">Add Category</button>
        </form>

        <form method="POST">
            <input name="category_search" type="text" placeholder="Enter value for Search">
            <button type="submit">Search</button>
        </form>

        <h2>Категорії:</h2>
        <ul class="category-list">
            <?php if (count($categories) > 0): ?>
                <?php foreach ($categories as $index => $category): ?>
                    <li onclick="showProducts(<?php echo $index; ?>)">
                        <?php echo $category->getCategoryName(); ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <?php if (isset($searched_category)): ?>
            <h3>Результати пошуку:</h3>
            <?php if ($searched_category !== null): ?>
                <h4>Категорія знайдена: <?php echo $searched_category->getCategoryName(); ?></h4>
                <ul>
                    <?php foreach ($searched_category->getCategoryProducts() as $product): ?>
                        <li><?php echo $product; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Категорію не знайдено.</p>
            <?php endif; ?>
        <?php endif; ?>

        <div id="product-list" class="product-list"></div>
    </div>

    <script>
        function showProducts(categoryIndex) {
            const categories = <?php echo json_encode($categories); ?>;
            const category = categories[categoryIndex];
            const productListDiv = document.getElementById('product-list');

            let productHtml = '<h3>Продукти в категорії: ' + category.getCategoryName() + '</h3>';
            productHtml += '<ul>';
            category.getCategoryProducts().forEach(product => {
                productHtml += '<li>' + product + '</li>';
            });
            productHtml += '</ul>';
            productListDiv.innerHTML = productHtml;
        }
    </script>
</body>
</html>