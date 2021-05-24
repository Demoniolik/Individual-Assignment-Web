<?php
    include 'model/product.php';
    include 'util/availability.php';
    include 'util/product_status.php';
    session_start();
  $connection = mysqli_connect('127.0.0.1', 'dima_bekker', 'ADMINthebest321', 'dimabekker131');
  if($connection == false) {
    echo "error";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/magnific-popup.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <title>Zoo shop</title>
</head>

<body>

    <div class="header">
        <div class="container">
            <div class="inner__header">
                <div class="logo">
                    <img src="img/icons/logo.svg" alt="">
                </div>
                <div class="header_menu_container">
                <a href="" class="header_items">Каталог</a>
                    <a href="" class="header_items">Про нас</a>
                    <a href="" class="header_items">Контакти</a>
                    <a href="" class="header_items">Доставка та оплата</a>
                    <a href="" class="header_items">Ще один новий пункт</a>
                </div>
                <div class="header_contacts">
                    <img src="img/icons/account.svg" alt="">
                    <?php 
                        if ($_SESSION["user_role"] == 2) {
                            echo "<a class=\"logout\" href=\"/redirect_controller/logout.php\">Log out</a>";
                        } else {
                            echo "<a class=\"toggle-popup\" href=\"#login-form\">Sign in</a>";
                        }
                    ?>
                </div>
            </div>
            <div class="header__menu">
                <form action="pages/find_product_by_name_page.php" method="get">
                    <!-- Search input -->
                    <input type="text" placeholder="Поиск товаров" name="search_value">
                    <button type="submit" id="search">
                        <!-- Seacrh button -->
                        <img src="img/icons/search.svg" alt="">
                    </button>
                </form>
                <div class="cart">
                    <img src="img/icons/cart.svg" alt="">
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
        <div class="slider">
            <div class="item">
                <h2></h2>
                <h3></h3>
                <img src="img/slider_content/cats.jpg" alt="">
            </div>
            <div class="item">
                <h2></h2>
                <h3></h3>
                <img src="img/slider_content/dogs.jpg" alt="">
            </div>
            <div class="item">
                <h2></h2>
                <h3></h3>
                <img src="img/slider_content/parrot.jpg" alt="">
            </div>
            <div class="item">
                <h2></h2>
                <h3></h3>
                <img src="img/slider_content/spider.jpg" alt="">
            </div>
            <a class="prev" onclick="minusSlide()">&#10094;</a>
            <a class="next" onclick="plusSlide()">&#10095;</a>
        </div>

        <div class="slider-dots">
            <span class="slider-dots_item" onclick="currentSlide(1)"></span>
            <span class="slider-dots_item" onclick="currentSlide(2)"></span>
            <span class="slider-dots_item" onclick="currentSlide(3)"></span>
            <span class="slider-dots_item" onclick="currentSlide(4)"></span>
        </div>

        <div class="main__container__content">
            <div class="nav_bar">
                <div class="nav_bar_header">
                    <img src="img/icons/Box.svg" alt="">
                    <h4>Продукти</h4>
                </div>
                <div class="category">
                    <div class="category_header" id="cat_food_category">
                        <h5>Категорії</h5>
                        <a href="#"><img src="img/icons/arrow.svg" alt=""></a>
                    </div>
                    <ul class="cat_options">
                    <?php                 
                            $categoriesSearch = mysqli_query($connection, "SELECT * FROM category;");
                            if(mysqli_num_rows($categoriesSearch) > 0) {
                                for($i = 0; $row = mysqli_fetch_assoc($categoriesSearch); $i++) {
                                    echo "<li> <a href=redirect_controller/show_items_by_category.php?category_id='$row[id]'>" . $row[name] . " </a> </li>";
                                  }
                            }
                        ?>
                    </ul>
                </div>
                <div class="category">
                    <div class="category_header" id="dog_food_category">
                        <h5>Фльтри</h5>
                        <a href="#"><img src="img/icons/arrow.svg" alt=""></a>
                    </div>
                    <ul class="dog_options">
                        <?php 
                            $categoriesSearch = mysqli_query($connection, "SELECT DISTINCT special_proposition FROM product;");
                            if(mysqli_num_rows($categoriesSearch) > 0) {
                                for($i = 0; $row = mysqli_fetch_assoc($categoriesSearch); $i++) {
                                    $str = str_replace(" ", "_", $row[special_proposition]);
                                    echo "<li> <a href=redirect_controller/filter_by_spec_proposition.php?proposition='$str'>" 
                                    . $row[special_proposition] . " </a> </li>";
                                  }
                            }
                        ?>
                    </ul>
                </div>
                <a href="redirect_controller/show_items_by_category.php" class="category_header clear_filters">Очистити фільтри</a>

            </div>
            <div class="prdoucts_container">

                <?php 
                
                $QUERY = "SELECT * FROM product;";

                if ($_SESSION["select_items"] != "") {
                    $QUERY = $_SESSION["select_items"];
                }

                $result = mysqli_query($connection, $QUERY);
                $productArray = array();

                if(mysqli_num_rows($result) > 0) {
                    for($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                        $productArray[] = new Product(
                            $row[id], $row[name], $row[price], 
                            $row[poster], $row[isAvailable], 
                            $row[special_proposition], $row[categoryId]
                        );
                    }
                }
                ?>

                <div class="products">
                    <?php  for ($index = 0; $index < count($productArray); $index++) { ?>
                    <div class="product_unit 
                            <?php 
                                echo setAvailabilityStatus($productArray[$index]->isAvailable);
                            ?> ">
                        <div class="unit_header">
                            <div class="status <?php echo setSpecialPropositionStatus($productArray[$index]->specialProposition); ?> ">
                                    <?php 
                                        echo $productArray[$index]->specialProposition;
                                    ?>
                            </div>
                            <h6><?php echo $productArray[$index]->id ?></h6>
                        </div>
                        <img src="<?php echo $productArray[$index]->poster; ?>" alt=""
                        href="pages/show_detailed_info.php?product_id=<?php echo $productArray[$index]->id ?>">
                        <div class="product_name">
                            <a href="pages/show_detailed_info.php?product_id=<?php echo $productArray[$index]->id ?>"> 
                                <?php echo $productArray[$index]->name ?> 
                            </a>
                        </div>
                        <div class="price"><?php echo $productArray[$index]->price ?> USD</div>
                        <button>В кошик</button>
                        <div class="availability <?php 
                                    echo setAvailabilityStatus($productArray[$index]->isAvailable);
                                ?>">
                                <?php 
                                    echo setAvailabilityValue($productArray[$index]->isAvailable);
                                ?> 
                            </div>
                    </div>
                   <?php 
                        }
                   ?>
                </div>
                <div class="show_more">
                    <img src="img/icons/refresh.svg" alt="">
                    <h3>Показать щё</h3>
                </div>
                <div class="paginator">
                    <a href="#" id="prev_page">Назад</a>
                    <a href="#" class="page">1</a>
                    <a href="#" class="page">2</a>
                    <a href="#" class="page current_page">3</a>
                    <a href="#" class="page">...</a>
                    <a href="#" class="page">12</a>
                    <a href="" id="next_page">Вперед</a>
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

   <!-- popup form -->
   <form id="login-form" class="mfp-hide white-popup-block" action="redirect_controller/authorization.php"
        method="post">
        <h2 class="title">Зайти в обліковий запис</h2>

        <p class="descr">
            Зайдіть в обліковий запис, щоб мати можливість переглядати товари,
            та здійснювати покупки 
        </p>

        <label for="login">Логін</label>
        <input type="email" name="login" id="login">

        <label for="password">Пароль</label>
        <input type="password" id="password" name="password">

        <button type="submit" class="btn">Ввійти</button>

        <a href="#reg-form" class="toggle-popup">Зареєструватися</a>
    </form>

    <!-- popup form -->
    <form id="reg-form" class="mfp-hide white-popup-block" action="redirect_controller/register.php"
        method="post">
        <h2 class="title">Зареєструватися</h2>

        <p class="descr">
            Зареєструйтеся на сайті, щоб мати можливість переглядати товари,
            та здійснювати покупки
        </p>

        <label for="first_name">Ім'я</label>
        <input type="text" id="first_name" name="first_name">

        <label for="second_name">Фамілія</label>
        <input type="text" id="second_name" name="second_name">

        <label for="login">Логін</label>
        <input type="email" id="login" name="login">

        <label for="password">Пароль</label>
        <input type="password" id="password" name="password">

        <label for="repeat_password">Підтвердіть пароль</label>
        <input type="password" id="repeat_password" name="repeat_password">

        <button type="submit" class="btn">Зареєеструватися</button>

        <a href="#login-form" class="toggle-popup">Ввійти</a>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/jquery.magnific-popup.min.js"></script>
    <script src="script.js"></script>

    <script src="slider.js"></script>
    <script src="nav_bar_script.js"></script>
</body>

</html>