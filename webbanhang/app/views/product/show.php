<?php include 'app/views/shares/header.php'; ?>


<h1>Chi tiết sản phẩm</h1>

<?php if ($product): ?>
    <div class="product-detail">
        <?php if ($product->image): ?>
            <img src="/webbanhang/<?= htmlspecialchars($product->image ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                 alt="<?= htmlspecialchars($product->name ?? 'Hình ảnh sản phẩm', ENT_QUOTES, 'UTF-8'); ?> Image" 
                 class="product-image">
        <?php endif; ?>
        
        <div class="product-info">
            <h2><?= htmlspecialchars($product->name ?? 'Chưa có tên sản phẩm', ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><strong>Mô tả:</strong> <?= htmlspecialchars($product->description ?? 'Chưa có mô tả', ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Giá:</strong> <?= htmlspecialchars($product->price ?? 'Chưa có giá', ENT_QUOTES, 'UTF-8'); ?> VND</p>
            <p><strong>Danh mục:</strong> Mỹ phẩm</p> <!-- Hiển thị luôn là "Mỹ phẩm" -->

            <form action="/webbanhang/Product/addToCart/<?= htmlspecialchars($product->id ?? '', ENT_QUOTES, 'UTF-8'); ?>" method="POST">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" style="width: 60px;">
                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </form>

            <div>
                <a href="/webbanhang/Product/edit/<?= htmlspecialchars($product->id ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning">Sửa</a>
                <a href="/webbanhang/Product/delete/<?= htmlspecialchars($product->id ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Không tìm thấy sản phẩm.</p>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>