<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title><?= Model::getTitle(); ?></title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <a href="/">My Internet Store</a>
        </div>
        <div id="menu">
            <ul>
                <li class="first active"><a href="/">Главная</a></li>
                <?php if (isset ($_SESSION['role']) && $_SESSION['role'] == 1) {
                    echo ' <li><a href="/adminPanel">Admin Panel</a></li>';
                } ?>
                <?php if (isset ($_SESSION['access']) && $_SESSION['access'] == true) {
                    echo '<li><a href="/login/logout">Logout</a></li>';
                } else {
                    echo ' <li><a href="/login">Login</a></li>';
                }
                ?>
                <li class="last"><a href="/product/cart">Корзина</a></li>
            </ul>
            <br class="clearfix"/>
        </div>
    </div>
    <div id="page">
        <div id="sidebar">
            <div class="side-box">
                Каталог товаров:
                <ul>
                    <?php if ($cat = new Model): ?>
                        <?php foreach ($cat->getCategories() as $category): ?>
                            <li>
                                <a class="btn btn-outline-info" href="/product?category=<?= $category->title; ?>">
                                    <?= $category->title; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="side-box">
                <?php
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] === 1) {
                        echo '<h6> Вы вошли как : <b>Администратор</b><h6/>';
                    } else {
                        echo '<h6> Вы вошли как : <b>Клиент</b><h6/>';
                    }
                }
                ?>
            </div>
        </div>
        <div id="content">
            <div class="box">
                <?php include 'application/views/' . $content_view; ?>
            </div>
            <br class="clearfix"/>
        </div>
        <br class="clearfix"/>
    </div>
</div>
<div id="footer">
    <a href="/">My Internet Store</a> &copy; 2018</a>
</div>
</body>
</html>