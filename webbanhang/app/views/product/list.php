<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5" style="background-color: #f0f0f0; border-radius: 15px; padding: 20px;">
    <!-- Thêm banner -->
    <div class="banner mb-5">
        <img src="/webbanhang/app/images/banner.png" 
             alt="Banner Khuyến Mãi" 
             class="img-fluid w-100" 
             style="border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
    </div>

    <h1 class="text-center mb-4" style="color: #2c3e50;">Danh sách sản phẩm</h1>

    <!-- Nút thêm sản phẩm mới -->
    <a href="/webbanhang/Product/add" class="btn btn-secondary mb-4">Thêm sản phẩm mới</a>

    <!-- Nút tìm kiếm sản phẩm -->
    <form action="/webbanhang/Product/search" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Tìm kiếm sản phẩm..." aria-label="Tìm kiếm sản phẩm">
            <button class="btn btn-secondary" type="submit">Tìm kiếm</button> <!-- Đổi lớp ở đây -->
        </div>
    </form>

    <!-- Hiển thị số lượng sản phẩm trong giỏ hàng -->
    <?php 
    $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
    if ($cartCount > 0): ?>
        <p class="text-center text-primary mb-4">Có <strong><?php echo $cartCount; ?></strong> sản phẩm trong <a href="/webbanhang/Product/cart" class="text-decoration-underline">giỏ hàng</a>.</p>
    <?php endif; ?>

    <!-- Danh sách sản phẩm dạng lưới ngang -->
    <?php if (!empty($products)): ?>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card h-100 product-card" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; background-color: #e9ecef; height: 400px;">
                        <!-- Hình ảnh sản phẩm -->
                        <?php if ($product->image): ?>
                            <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                 class="card-img-top" 
                                 alt="Product Image" 
                                 style="max-height: 250px; object-fit: cover; border-bottom: 2px solid #3498db;">
                        <?php endif; ?>

                        <!-- Nội dung sản phẩm -->
                        <div class="card-body text-center" style="padding: 25px;">
                            <h5 class="card-title" style="font-size: 1.5em;">
                                <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" 
                                   class="text-decoration-none text-dark" 
                                   style="font-weight: 600; color: #2c3e50;">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted mb-2" style="font-size: 1.2em; min-height: 40px;">
                                <?php echo htmlspecialchars(substr($product->description, 0, 50), ENT_QUOTES, 'UTF-8'); ?>...
                            </p>
                            <p class="card-text fw-bold" style="color: #e74c3c; font-size: 1.3em;">
                                Giá: <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                            </p>
                            <p class="card-text text-muted" style="font-size: 1.5em;">
                                Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        </div>

                        <!-- Nút hành động -->
                        <div class="card-footer bg-transparent border-0 text-center">
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" 
                               class="btn btn-secondary btn-sm mb-2" 
                               style="width: 48%;">Sửa</a>
                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-secondary btn-sm mb-2" 
                               style="width: 48%;" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" 
                               class="btn btn-secondary btn-sm" 
                               style="width: 100%;">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">Hiện tại chưa có sản phẩm nào.</p>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<!-- Thêm CSS tùy chỉnh -->
<style>
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .card-img-top {
        transition: opacity 0.3s;
    }
    .card-img-top:hover {
        opacity: 0.8;
    }
    .btn-secondary {
        background-color: #343a40; /* Màu xám đen */
        border-color: #343a40; /* Màu viền xám đen */
        color: white; /* Màu chữ trắng */
    }
    .btn-secondary:hover {
        background-color: #212529; /* Màu khi hover */
        border-color: #212529; /* Màu viền khi hover */
    }
    .banner img {
        transition: transform 0.3s;
    }
    .banner img:hover {
        transform: scale(1.02);
    }
</style>