<?php 
    include '../../model/user.php';
    session_start();
    if ($_SESSION["user_role"] != 2) {
        header("Location: error/forbidden_access.html");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/magnific-popup.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <title>Товар</title>
</head>

<body>

    <div class="header">
        <div class="container">
            <div class="inner__header">
                <a href="../index.php" class="logo">
                    <img src="../img/icons/logo.svg" alt="">
                </a>
                <div class="header_menu_container">
                    <a href="" class="header_items">Каталог</a>
                    <a href="" class="header_items">О нас</a>
                    <a href="" class="header_items">Контакты</a>
                    <a href="" class="header_items">Доставка и оплата</a>
                    <a href="" class="header_items">Ещё какой-то пункт</a>
                </div>
                <div class="header_contacts">
                    <img src="../img/icons/account.svg" alt="">
                    <a class="toggle-popup" href="../#login-form">Sign in</a>
                </div>
            </div>
            <div class="header__menu">
                <form action="">
                    <!-- Search input -->
                    <input type="text" placeholder="Поиск товаров">
                    <button type="submit" id="search">
                        <!-- Seacrh button -->
                        <img src="img/icons/search.svg" alt="">
                    </button>
                </form>
                <div class="cart">
                    <img src="../img/icons/cart.svg" alt="">
                    <div class="amount_of_product">

                    </div>
                    <div class="total_amount_to_pay">
                        1501 $
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="main_container">

        <div class="main__container__content">
            <div class="card">
            <?php 
                include '../model/product.php';
                $product_id = $_GET["product_id"];

                $connection = mysqli_connect('127.0.0.1', 'dima_bekker', 'ADMINthebest321', 'dimabekker131');
                if($connection == false) {
                  echo "error";
                }

                $QUERY = "SELECT * FROM product WHERE id = '$product_id';";

                $result = mysqli_query($connection, $QUERY);
                    echo mysqli_error($connection);

                    if(mysqli_num_rows($result) > 0) {
                        for($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                            $desription = $row[description];
                            $product = Product::buildProduct(
                                $row[id], $row[name], $row[price], $row[description],
                                $row[poster], $row[isAvailable], 
                                $row[special_proposition], $row[category_id]
                            );
                            $product->desctiption = $row[description];
                        }
                    }
                ?>
                <div class="container-img"><img src="../<?php echo $product->poster; ?>" alt=""></div>

                <div class="product-info">
                    <div class="availability"><?php echo ($product->isAvailable == 1) ? "Є в наявності" : "Немає в наявності"; ?></div>
                    <div class="id"><?php echo $product->id; ?></div>
                    <div class="name"> <?php echo $product->name; ?> </div>
                    <div class="price"><?php echo $product->price; ?> USD</div>
                    <button>В корзину</button>

                    <div class="title">Описание</div>

                    <div class="descr">
                        <?php echo $desription; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="general_data">
            <div class="footer_logo"></div>
            <p>Договор від 22.03.2021</p>
            <p>Також важлива інформація</p>
            <p>© «All rights are preserved», 2021</p>
        </div>
        <div class="pages_of_site">
            <h3>Сторінки сайта</h3>
            <div class="pages_of_site_container">
                <a href="">
                    <h3>Каталог</h3>
                </a><a href="">
                    <h3>Про нас</h3>
                </a><a href="">
                    <h3>Контакти</h3>
                </a><a href="">
                    <h3>Доставка та оплата</h3>
                </a><a href="">
                    <h3>Ще один пункт</h3>
                </a>
            </div>
        </div>
        <div class="contacts">
            <h3>Контакти</h3>
            <p>+380 80 353 55 55</p>
            <p>example.support@domain.com</p>
            <p>м. Сумы вул. Люблинская</p>
        </div>
        <div class="social_networks">
            <h3>Ми в соц. мережах</h3>
            <a href="">
                <img src="img/icons/fb.png" alt="">
            </a>
            <a href="">
                <img src="img/icons/inst.png" alt="">
            </a>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/jquery.magnific-popup.min.js"></script>
    <script src="script.js"></script>

    <script src="slider.js"></script>
    <script src="nav_bar_script.js"></script>
</body>

</html>