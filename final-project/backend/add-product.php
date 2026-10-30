
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Admin Dashboard</title>

    

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="stylesheet" href="./assets/style.css">

    

</head>
<body>

<div class="dashboard">

    <!-- Sidebar -->
    <aside class="sidebar">
        <a href="#" class="brand">
            <span class="brand-icon">S</span>
            Store<span class="brand-light">Admin</span>
        </a>

        <p class="menu-heading">MAIN MENU</p>

        <a href="#" class="menu-link">
            <span>▦</span> Dashboard
        </a>
        <a href="#" class="menu-link">
            <span>▤</span> All Products
        </a>
        <a href="#" class="menu-link active">
            <span>＋</span> Add Product
        </a>
        <a href="#" class="menu-link">
            <span>▧</span> Categories
        </a>
        <a href="#" class="menu-link">
            <span>♙</span> Customers
        </a>

        <div class="sidebar-bottom">
            <div class="admin-avatar">A</div>
            <div>
                <strong>Admin User</strong>
                <small>Store Administrator</small>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <header class="topbar">
            <div>
                <p class="topbar-label">STORE MANAGEMENT</p>
                <h5>Product Management</h5>
            </div>

            <div class="topbar-right">
                <span class="status-dot"></span>
                <span>Admin Panel</span>
            </div>
        </header>

        <section class="page-content">

            <div class="breadcrumb">
                Dashboard <span>/</span> Products
                <span>/</span> <strong>Add Product</strong>
            </div>

            <div class="page-heading">
                <div>
                    <span class="eyebrow">PRODUCT CATALOG</span>
                    <h1>Add New Product</h1>
                    <p>Create a product listing and add it to your store.</p>
                </div>

                <div class="secure-label">
                    <span>✓</span> Product Setup
                </div>
            </div>

            <form action="insert.php" method="post"
                  enctype="multipart/form-data">

                <!-- Product Information -->
                <div class="form-card">

                    <div class="section-heading">
                        <div class="section-icon">▤</div>
                        <div>
                            <h3>Basic Information</h3>
                            <p>Enter the essential details of your product.</p>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <div class="mb-4">
                        <label for="category" class="form-label">
                            Product Category <span class="required">*</span>
                        </label>

                        <select class="form-select" id="category"
                                name="cat" required>
                            <option value="" selected disabled>
                                Choose a category
                            </option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="shoes">Shoes</option>
                            <option value="accessories">Accessories</option>
                            <option value="home">Home & Living</option>
                            <option value="other">Other</option>
                        </select>
                        <small class="field-help">
                            Select the category that best describes your product.
                        </small>
                    </div>

                    <div class="mb-4">
                        <label for="productName" class="form-label">
                            Product Name <span class="required">*</span>
                        </label>

                        <input type="text" class="form-control"
                               id="productName" name="pname"
                               placeholder="e.g. Premium Wireless Headphones"
                               maxlength="200" required>
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">
                            Product Description <span class="required">*</span>
                        </label>

                        <textarea class="form-control"
                                  id="description" name="pdes"
                                  rows="5" maxlength="5000"
                                  placeholder="Describe your product, its features, quality and benefits..."
                                  required></textarea>

                        <small class="field-help">
                            Write a clear description to help customers understand your product.
                        </small>
                    </div>

                </div>

                <!-- Image Upload -->
                <div class="form-card">

                    <div class="section-heading">
                        <div class="section-icon">▧</div>
                        <div>
                            <h3>Product Media</h3>
                            <p>Upload a high-quality image of your product.</p>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <label for="productImage" class="form-label">
                        Product Image <span class="required">*</span>
                    </label>

                    <label for="productImage" class="upload-area">
                        <div class="upload-icon">↑</div>
                        <h4>Click to upload your image</h4>
                        <p>PNG, JPG, JPEG or WEBP</p>
                        <span class="upload-button">Choose Image</span>
                    </label>

                    <input type="file" class="visually-hidden"
                           id="productImage" name="pimg"
                           accept="image/jpeg,image/png,image/webp"
                           required>

                    <div id="imagePreview" class="image-preview"
                         hidden>
                        <img id="previewImage" src="" alt="Product preview">
                        <div class="preview-details">
                            <strong id="fileName"></strong>
                            <small>Image selected</small>
                        </div>
                        <button type="button" id="removeImage"
                                class="remove-image" aria-label="Remove image">
                            ✕
                        </button>
                    </div>

                </div>

                <!-- Pricing -->
                <div class="form-card">

                    <div class="section-heading">
                        <div class="section-icon">₨</div>
                        <div>
                            <h3>Pricing Information</h3>
                            <p>Set the regular and promotional prices.</p>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="regularPrice" class="form-label">
                                Regular Price (PKR)
                                <span class="required">*</span>
                            </label>

                            <div class="input-group price-group">
                                <span class="input-group-text">PKR</span>
                                <input type="number" class="form-control"
                                       id="regularPrice" name="rprice"
                                       placeholder="0.00" min="0"
                                       step="0.01" required>
                            </div>
                            <small class="field-help">
                                Original selling price.
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label for="salePrice" class="form-label">
                                Sale Price (PKR)
                            </label>

                            <div class="input-group price-group">
                                <span class="input-group-text">PKR</span>
                                <input type="number" class="form-control"
                                       id="salePrice" name="sprice"
                                       placeholder="Optional discount price"
                                       min="0" step="0.01">
                            </div>
                            <small class="field-help">
                                Leave empty if no discount is available.
                            </small>
                        </div>
                    </div>

                    <div id="priceMessage" class="price-message"
                         aria-live="polite" hidden></div>

                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <p><span class="required">*</span> Required fields</p>

                    <div class="action-buttons">
                        <button type="reset" class="btn-cancel">
                            Reset Form
                        </button>

                        <button type="submit" class="btn-submit" name="btn">
                            <span>＋</span> Add Product
                        </button>
                    </div>
                </div>

            </form>

            <footer class="page-footer">
                © 2026 StoreAdmin. All rights reserved.
                <span>Product Management System</span>
            </footer>

        </section>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const imageInput = document.getElementById("productImage");
    const imagePreview = document.getElementById("imagePreview");
    const previewImage = document.getElementById("previewImage");
    const fileName = document.getElementById("fileName");
    const removeImage = document.getElementById("removeImage");
    const form = document.querySelector("main form");

    let previewUrl = null;

    function clearPreview() {
        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        previewImage.src = "";
        imagePreview.hidden = true;
        fileName.textContent = "";
    }

    imageInput.addEventListener("change", function () {
        clearPreview();

        const file = this.files[0];
        if (!file) return;

        if (!["image/jpeg", "image/png", "image/webp"].includes(file.type)) {
            alert("Please select a JPG, PNG or WEBP image.");
            this.value = "";
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            alert("Image size must be 5 MB or less.");
            this.value = "";
            return;
        }

        previewUrl = URL.createObjectURL(file);
        previewImage.src = previewUrl;
        fileName.textContent = file.name;
        imagePreview.hidden = false;
    });

    removeImage.addEventListener("click", function () {
        imageInput.value = "";
        clearPreview();
    });

    form.addEventListener("reset", function () {
        clearPreview();
        document.getElementById("priceMessage").hidden = true;
    });

    const regularPrice = document.getElementById("regularPrice");
    const salePrice = document.getElementById("salePrice");
    const priceMessage = document.getElementById("priceMessage");

    function checkPrices() {
        const regular = regularPrice.value;
        const sale = salePrice.value;

        priceMessage.hidden = true;

        if (regular === "" || sale === "") return;

        if (Number(sale) > Number(regular)) {
            priceMessage.textContent =
                "Sale price should not be higher than the regular price.";
            priceMessage.hidden = false;
        }
    }

    regularPrice.addEventListener("input", checkPrices);
    salePrice.addEventListener("input", checkPrices);

    form.addEventListener("submit", function (event) {
        if (
            regularPrice.value !== "" &&
            salePrice.value !== "" &&
            Number(salePrice.value) > Number(regularPrice.value)
        ) {
            event.preventDefault();
            checkPrices();
            salePrice.focus();
        }
    });
</script>

</body>
</html>
