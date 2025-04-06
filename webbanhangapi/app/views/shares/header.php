<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #f8f9fa, #6c757d);
            overflow-x: hidden;
            font-size: 20px;
            color:rgb(118, 124, 130);
        }

        .navbar {
            background-color:rgb(130, 134, 139) !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
            font-size: 2.2rem;
        }

        .nav-link {
            color: #ffffff !important;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .nav-link:hover {
            color:rgb(5, 127, 241) !important;
        }

        .form-control {
            font-size: 1.3rem;
            padding: 12px;
        }

        .btn-outline-light {
            font-size: 1.3rem;
            padding: 12px 18px;
            border-radius: 8px;
        }

        .container {
            max-width: 1300px;
        }

        .card {
            min-height: 400px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            padding: 20px;
            border-radius: 15px;
        }

        .dropdown-menu {
            font-size: 1.3rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang/product/list">Quản lý sản phẩm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Product/list">Danh sách sản phẩm</a>
                    </li>
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/category/list">Quản lý danh mục</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/Cart">Giỏ hàng</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <form class="d-flex" action="/webbanhang/Product/search" method="GET">
                            <input class="form-control me-2" type="search" name="query" placeholder="Tìm kiếm sản phẩm...">
                            <button class="btn btn-outline-light" type="submit">🔍</button>
                        </form>
                    </li>
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown">
                                <?php echo htmlspecialchars($_SESSION['username']); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <?php if (SessionHelper::isAdmin()): ?>
                                    <li><a class="dropdown-item" href="/webbanhang/admin">⚙️ Quản trị</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="/webbanhang/account/profile">Thông tin tài khoản</a></li>
                                    <li><a class="dropdown-item" href="/webbanhang/account/orders">Đơn hàng của tôi</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item text-danger" href="/webbanhang/account/logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/account/login">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/account/register">Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Nội dung trang -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>