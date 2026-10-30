
<?php

require_once __DIR__ . '/config.php';

// Sirf POST request allow hai.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../frontend/view.php');
    exit;
}

// Product ID validate karein.
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header('Location: ../frontend/view.php?error=1');
    exit;
}

// Prepared statement se product delete karein.
$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM `addprod` WHERE `id` = ?"
);

if (!$stmt) {
    error_log('Delete prepare failed: ' . mysqli_error($conn));
    header('Location: ../frontend/view.php?error=1');
    exit;
}

mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {

    if (mysqli_stmt_affected_rows($stmt) === 1) {
        mysqli_stmt_close($stmt);
        header('Location: ../frontend/view.php?deleted=1');
        exit;
    }
}

error_log('Product delete failed: ' . mysqli_stmt_error($stmt));

mysqli_stmt_close($stmt);

header('Location: ../frontend/view.php?error=1');
exit;
