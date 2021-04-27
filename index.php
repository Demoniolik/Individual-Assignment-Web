<?php
    include 'model/product.php';
    include 'util/availability.php';
    include 'util/product_status.php';

  $connection = mysqli_connect('127.0.0.1', 'root', '', 'pet_shop');
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Zoo shop</title>
</head>
<body>
    
    <div class="header">
        <div class="inner__header">
            <div class="logo">
                <img src="img/icons/logo.svg" alt="">
            </div>
            <div class="header_menu_container">
                <a href="" class="header_items">Какталог</a>
                <a href="" class="header_items">О нас</a>
                <a href="" class="header_items">Контакты</a>
                <a href="" class="header_items">Доставка и оплата</a>
                <a href="" class="header_items">Ещё какой-то пункт</a>
            </div>
            <div class="header_contacts">
                <img src="img/icons/account.svg" alt="">
                <a href="">Sign in</a>
            </div>
        </div>
        <div class="header__menu">
            <!-- Header categories button -->
            <!-- <a href="">
                <img src="" alt="">
            </a> -->
            <form action="">
                <!-- Search input -->
                <input type="text" placeholder="Поиск товаров">
                <button type="submit" id="search">
                    <!-- Seacrh button -->
                    <img src="img/icons/search.svg" alt="">
                </button>
            </form>

            <!-- Facebook -->
            <a href=""><img src="img/icons/fb.png" alt=""></a> 
            <!-- Instagram -->
            <a href=""><img src="img/icons/inst.png" alt=""></a>
            <div class="cart">
                <img src="img/icons/cart.svg" alt="">
                <div class="amount_of_product">

                </div>
                <div class="total_amount_to_pay">
                    0 USD
                </div>
            </div>
        </div>
    </div>

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

    <div class="main_container">
        <div class="main__container__content">
            <div class="nav_bar">
                <div class="nav_bar_header">
                    <img src="img/icons/Box.svg" alt="">
                    <h4>Products</h4>
                </div>
                <div class="category">
                    <div class="category_header" id="cat_food_category">
                        <h5>Cats food</h5>
                        <a href="#"><img src="img/icons/arrow.svg" alt=""></a>
                    </div>
                    <ul class="cat_options">
                        <li>Cat category #1</li>
                        <li>Cat category #2</li>
                        <li>Cat category #3</li>
                        <li>Cat category #4</li>
                        <li>Cat category #5</li>
                    </ul>
                </div>
                <div class="category">
                    <div class="category_header" id="dog_food_category">
                        <h5>Dogs food</h5>
                        <a href="#"><img src="img/icons/arrow.svg" alt=""></a>
                    </div>
                    <ul class="dog_options">
                        <li>Dog category #1</li>
                        <li>Dog category #2</li>
                        <li>Dog category #3</li>
                        <li>Dog category #4</li>
                    </ul>
                </div>
                <div class="category">
                    <div class="category_header" id="parrot_food_category">
                        <h5>Parrot food</h5>
                        <a href="#"><img src="img/icons/arrow.svg" alt=""></a>
                    </div>
                    <ul class="parrot_options">
                        <li>Parrot category #1</li>
                        <li>Parrot category #2</li>
                        <li>Parrot category #3</li>
                    </ul>
                </div>
            </div>
            <?php 
            
            $result = mysqli_query($connection, "SELECT * FROM product;");
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

            <div class="prdoucts_container">
                <div class="products">
                    
                <?php
                    $AMOUNT_OF_ROWS = ceil(count($productArray) / 4);
                    $index = 0;
                    for ($i = 0; $i < $AMOUNT_OF_ROWS; $i++) {
                ?>
                    
                    <div class="products_row">
                        <?php 
                            for ($j = 0; $j < 4 && $index < count($productArray); $j++) {
                        ?>

                        <div class="product_unit 
                            <?php 
                                echo setAvailabilityStatus($productArray[$index]->isAvailable);
                            ?> 
                        ">
                            <div class="unit_header">
                                <div class="status <?php echo setSpecialPropositionStatus($productArray[$index]->specialProposition); ?>">
                                    <?php 
                                        echo $productArray[$index]->specialProposition;
                                    ?>
                                </div>
                                <h6><?php echo $productArray[$index]->id ?></h6>
                            </div>
                            <img src="img/main_content/dogs_product.jpg" alt="">
                            <div class="product_name"><?php echo $productArray[$index]->name ?></div>
                            <div class="price"><?php echo $productArray[$index]->price ?> USD</div>
                            <button>В корзину</button>
                            <div class="availability 
                                <?php 
                                    echo setAvailabilityStatus($productArray[$index]->isAvailable);
                                ?>
                            ">
                                <?php 
                                    echo setAvailabilityValue($productArray[$index]->isAvailable);
                                ?> 
                            </div>
                        </div>
                        <?php 
                                $index++;
                            }
                        ?>
                    </div>
                    <hr>
                    <?php 
                        }
                    ?>
                </div>
                <div class="show_more">
                    <img src="img/icons/refresh.svg" alt="">
                    <h3>Показать ещё</h3>
                </div>
                <div class="paginator">
                    <a href="#" id="prev_page">Назад</a>
                    <a href="#" class="page">1</a>
                    <a href="#" class="page">2</a>
                    <a href="#" class="page current_page">3</a>
                    <a href="#" class="page">...</a>
                    <a href="#" class="page">12</a>
                    <a href="" id="next_page">Вперёд</a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="general_data">
            <div class="footer_logo"></div>
            <p>Договор от 22.03.2021</p>
            <p>Тоже важная ифнормация</p>
            <p>© «All rights are preserved», 2021</p>
        </div>
        <div class="pages_of_site">
            <h3>Страницы сайта</h3>
            <div class="pages_of_site_container">
                <a href="">
                    <h3>Каталог</h3>
                </a><a href="">
                    <h3>О нас</h3>
                </a><a href="">
                    <h3>Контакты</h3>
                </a><a href="">
                    <h3>Дотсавка и оплата</h3>
                </a><a href="">
                    <h3>Ещё какой-то пункт</h3>
                </a>
            </div>
        </div>
        <div class="contacts">
            <h3>Контакты</h3>
            <p>+380 80 353 55 55</p>
            <p>example.support@domain.com</p>
            <p>г. Сумы ул. Люблинская</p>
        </div>
        <div class="social_networks">
            <h3>Мы в соц. сетях</h3>
            <a href="">
                <img src="img/icons/fb.png" alt="">
            </a>
            <a href="">
                <img src="img/icons/inst.png" alt="">
            </a>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="slider.js"></script>
    <script src="nav_bar_script.js"></script>
</body>
</html>