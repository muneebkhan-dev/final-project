<?php

require_once '../backend/config.php';

include 'header.php';

// Fetch products from database
$sql = "SELECT
            `id`,
            `category`,
            `product name`,
            `product image`,
            `regular price`,
            `sale price`,
            `pdes`,
            `date`
        FROM `addprod`
        ORDER BY `id` DESC";

$result = mysqli_query($conn, $sql);

?>

<section class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold">Our Products</h1>
        <p class="text-muted">
            Discover our latest products and offers.
        </p>
    </div>

    <?php if ($result === false): ?>

        <div class="alert alert-danger">
            Products load nahi ho sake.
            Please database table aur column names check karein.
        </div>

        <?php error_log("Product query failed: " . mysqli_error($conn)); ?>

    <?php elseif (mysqli_num_rows($result) > 0): ?>

        <div class="row g-4">

            <?php while ($product = mysqli_fetch_assoc($result)): ?>

                <?php
                $name = $product['product name'] ?? '';
                $category = $product['category'] ?? '';
                $description = $product['pdes'] ?? '';
                $image = '../backend/assets/images/' . basename(
                    trim($product['product image'] ?? '')
                );

                $regularPrice = (float) (
                    $product['regular price'] ?? 0
                );

                $salePrice = (float) (
                    $product['sale price'] ?? 0
                );

                // Sale price tabhi use karein jab valid discount ho.
                $hasSale = (
                    $salePrice > 0 &&
                    $regularPrice > 0 &&
                    $salePrice < $regularPrice
                );

                $displayPrice = $hasSale
                    ? $salePrice
                    : $regularPrice;
                ?>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">

                    <div class="card product-card h-100 shadow-sm">

                        <?php if ($image !== ''): ?>

                            <img
                                src="<?= htmlspecialchars(
                                            $image,
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>"
                                class="product-image"
                                alt="<?= htmlspecialchars(
                                            $name,
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>"
                                loading="lazy">

                        <?php else: ?>

                            <div class="product-placeholder">
                                No Image Available
                            </div>

                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">

                            <?php if ($category !== ''): ?>
                                <p class="text-muted small mb-2">
                                    <?= htmlspecialchars(
                                        $category,
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </p>
                            <?php endif; ?>

                            <h5 class="card-title fw-bold">
                                <?= htmlspecialchars(
                                    $name,
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </h5>

                            <p class="card-text text-secondary small">
                                <?= nl2br(htmlspecialchars(
                                    $description,
                                    ENT_QUOTES,
                                    'UTF-8'
                                )) ?>
                            </p>

                            <div class="mt-auto pt-2">

                                <div class="mb-3">

                                    <span class="product-price">
                                        Rs. <?= number_format(
                                                $displayPrice,
                                                2
                                            ) ?>
                                    </span>

                                    <?php if ($hasSale): ?>
                                        <br>

                                        <span class="regular-price">
                                            Rs. <?= number_format(
                                                    $regularPrice,
                                                    2
                                                ) ?>
                                        </span>

                                        <span class="sale-badge ms-2">
                                            SALE
                                        </span>
                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    <?php else: ?>

        <div class="alert alert-info text-center">
            Abhi koi product available nahi hai.
        </div>

    <?php endif; ?>

</section>

<?php
include 'footer.php';
?>