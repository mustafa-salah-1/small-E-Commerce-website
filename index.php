<?php

$title_page = "Game Store Page";
$file_css = "home.css";

include 'components/app.php';
include "app/php/config/config.php";
include "app/php/admin/product/functions.php";

$controllers = getProductsByCategory("controller");
$keyboards = getProductsByCategory("keyboard");
$mouses = getProductsByCategory("mouse");


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
  <?php if (count($controllers) > 0) : ?>
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Controller</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
        <?php foreach ($controllers as $controller) : ?>
          <a href="show_product.php?id=<?= $controller['id'] ?>" class="text-decoration-none">
            <div class="col">
              <div class="card">
                <img src="public/product-images/main/<?= $controller['product_image'] ?>" class="card-img-top" alt="<?= $controller['product_name'] ?>">
                <div class="card-body">
                  <h5 class="card-title text-truncate"><?= $controller['product_name'] ?></h5>
                  <p class="card-text text-truncate"><?= $controller['product_content'] ?></p>
                  <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                    <span class="price-tag ">IQD <?= $controller['product_price_sell'] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if (count($keyboards) > 0) : ?>
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Keyboard</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
        <?php foreach ($keyboards as $keyboard) : ?>
          <a href="show_product.php?id=<?= $keyboard['id'] ?>" class="text-decoration-none">
            <div class="col">
              <div class="card">
                <img src="public/product-images/main/<?= $keyboard['product_image'] ?>" class="card-img-top" alt="<?= $keyboard['product_name'] ?>">
                <div class="card-body">
                  <h5 class="card-title text-truncate"><?= $keyboard['product_name'] ?></h5>
                  <p class="card-text text-truncate"><?= $keyboard['product_content'] ?></p>
                  <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                    <span class="price-tag ">IQD <?= $keyboard['product_price_sell'] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if (count($mouses) > 0) : ?>
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Mouse</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
        <?php foreach ($mouses as $mouse) : ?>
          <a href="show_product.php?id=<?= $mouse['id'] ?>" class="text-decoration-none">
            <div class="col">
              <div class="card">
                <img src="public/product-images/main/<?= $mouse['product_image'] ?>" class="card-img-top" alt="<?= $mouse['product_name'] ?>">
                <div class="card-body">
                  <h5 class="card-title text-truncate"><?= $mouse['product_name'] ?></h5>
                  <p class="card-text text-truncate"><?= $mouse['product_content'] ?></p>
                  <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                    <span class="price-tag ">IQD <?= $mouse['product_price_sell'] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endif; ?>
</div>

<?php include 'components/footer.php'; ?>