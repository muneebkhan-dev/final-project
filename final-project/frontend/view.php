
<?php
require_once __DIR__ . '/../backend/config.php';

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

include __DIR__ . '/header.php';
?>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">View Products</h2>
        <span class="badge bg-dark">All Products</span>
    </div>

    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-success">
            Product successfully deleted.
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">
            Product delete nahi ho saka. Please dobara try karein.
        </div>
    <?php endif; ?>

    <?php if ($result === false): ?>

        <div class="alert alert-danger">
            Products load nahi ho sake. Database query check karein.
        </div>

        <?php error_log('View products query failed: ' . mysqli_error($conn)); ?>

    <?php elseif (mysqli_num_rows($result) > 0): ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle bg-white">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Regular Price</th>
                        <th>Sale Price</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)): ?>

                        <tr>
                            <td>
                                <?= (int) $row['id'] ?>
                            </td>

                            <td>
                                <?php if (!empty($row['product image'])): ?>
                                    <img
                                        src="<?= htmlspecialchars(
                                            $row['product image'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>"
                                        alt="Product"
                                        width="65"
                                        height="60"
                                        style="object-fit:cover; border-radius:6px;"
                                    >
                                <?php else: ?>
                                    <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $row['product name'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $row['category'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </td>

                            <td>
                                Rs. <?= number_format(
                                    (float) $row['regular price'],
                                    2
                                ) ?>
                            </td>

                            <td>
                                Rs. <?= number_format(
                                    (float) $row['sale price'],
                                    2
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $row['date'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?>
                            </td>

                            <td>
                                <form
                                    action="../backend/delete.php"
                                    method="POST"
                                    onsubmit="return confirm('Kya aap waqai is product ko delete karna chahte hain?');"
                                    class="d-inline"
                                >
                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= (int) $row['id'] ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        title="Delete product"
                                        aria-label="Delete product"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            viewBox="0 0 16 16"
                                            aria-hidden="true"
                                        >
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1 0-2H5.5l1-1h3l1 1h3a1 1 0 0 1 1 1M4 4v9a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4zM6.5 2l-.5.5h4L9.5 2z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>
        </div>

    <?php else: ?>

        <div class="alert alert-info text-center">
            Abhi koi product add nahi hua.
        </div>

    <?php endif; ?>

</div>

<?php include __DIR__ . '/footer.php'; ?>
