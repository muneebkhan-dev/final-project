<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Products Store</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar-brand {
            font-size: 25px;
            font-weight: bold;
        }

        .product-card {
            border: 0;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.25s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
        }

        .product-image {
            height: 220px;
            width: 100%;
            object-fit: cover;
            background: white;
        }

        .product-placeholder {
            height: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #e9ecef;
            color: #6c757d;
        }

        .product-price {
            color: #198754;
            font-size: 21px;
            font-weight: bold;
        }

        .regular-price {
            color: #888;
            text-decoration: line-through;
            font-size: 14px;
        }

        .sale-badge {
            background: #dc3545;
            color: white;
            padding: 4px 9px;
            border-radius: 5px;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="products.php">
                My Store
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="products.php">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="view.php">
                            View Products
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>