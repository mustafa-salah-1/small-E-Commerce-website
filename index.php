<?php

$title_page = "Game Store Page";
$file_css = "home.css";

include 'components/app.php';
include "app/php/config/config.php";
include "app/php/admin/product/functions.php";
include "app/php/admin/category/functions.php";

$categories = getAllCategories();

$data = [];

foreach ($categories as $category) {
  $category_name = $category['category_name'];
  $products = getProductsByCategory($category_name);

  if (!empty($products)) {
    $data[$category_name] = $products;
  }
}

?>

<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="public/img/w2.jpg" class="d-block w-100" alt="Slide 1" />
    </div>
    <div class="carousel-item">
      <img src="public/img/w1.webp" class="d-block w-100" alt="Slide 2" />
    </div>
    <div class="carousel-item">
      <img src="public/img/w3.jpg" class="d-block w-100" alt="Slide 3" />
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div>
  <?php foreach ($data as $category_name => $products): ?>
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading"><?= htmlspecialchars($category_name) ?></h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
        <?php foreach ($products as $product): ?>
          <a href="show_product.php?id=<?= $product['id'] ?>" class="text-decoration-none">
            <div class="col">
              <div class="card h-100">
                <img src="public/product-images/main/<?= $product['product_image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($product['product_name']) ?>">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title text-truncate"><?= htmlspecialchars($product['product_name']) ?></h5>
                  <p class="card-text text-truncate"><?= htmlspecialchars($product['product_content']) ?></p>
                  <div class="d-flex justify-content-between align-items-center mt-auto">
                    <span class="price-tag">IQD <?= number_format($product['product_price_sell']) ?></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endforeach; ?>
</div>

<?php include 'components/footer.php'; ?>