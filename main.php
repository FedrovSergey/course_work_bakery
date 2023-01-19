<?php
	require_once "core/config.php";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	mysqli_set_charset($conn, 'utf8');
	print_r($_COOKIE);
	$info = [];
	
	$sql = "SELECT * FROM menu";
	$res = $conn->query($sql);
	
	$telephone = '';
	if(isset($_COOKIE['telephone'])) $telephone = $_COOKIE['telephone'];
?>


<!doctype html>
<html lang="Rus">

<head>
    <meta charset="UTF8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пекарня | Сайт</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
	<!--
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700&amp;subset=cyrillic-ext" rel="stylesheet">
	 -->
</head>

<body>

    <header id="home">
        <div class="container">
            <div class="hamburger-menu">
                <i class="fas fa-bars toggle"></i>
                <i class="fas fa-times toggle"></i>
            </div>
            <nav class="d-flex align-items-center justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="index.html">
                    <img class="img-fluid" src="images/logo.png" alt='logo'>
                </a>
                <ul class="nav-list text-center p-0">
					
					<?php if(!isset($_COOKIE['name'])): ?>
				
					<li class="nav-item">
                        <button onclick = "show('block')" class="nav-btn" style="color:white">Регистрация</button>
						
						<div onclick="show('none')" id = "gray"></div>
						<div id="window">
						<div class = "form">
							<form action="core/signup.php" method="POST">
								<h2>Регистрация</h2>
								<div> <input type="text" placeholder="name:" name="name" class="input"></div>
								<div> <input type="text" placeholder="surname:" name="surname" class="input"></div>
								<div> <input type="text" placeholder="email:" name="email" class="input"></div>
								<div> <input type="text" placeholder="password:" name="pass" class="input"></div>
								<div> <input type="text" placeholder="telephone:" name="telephone" class="input"></div>
								<div>admin:
									<input type="radio" value="yes" name="sex">yes
									<input type="radio" value="no" name="sex">no
								</div>
								<div> <input type="text" placeholder="adminpass:" name="adminpass" class="input"></div>
								<input type="submit" value="send">
							</form>
						</div>
						</div>
							
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Сайт</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">О</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Меню</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#chef">Наша Команда</a>
                    </li>
					<li class="nav-item">
                        <button onclick="show1('block')" class="nav-btn" style="color:white">Вход</button>
						
						<div onclick="show1('none')" id = "gray1"></div>
						<div id="window1">
						<div class = "form">
							<form action="core/login.php" method="POST">
								<h2>Вход</h2>
								<div> <input type="text" placeholder="email:" name="email" class="input"></div>
								<div> <input type="text" placeholder="password:" name="pass" class="input"></div>
								<input type="submit" value="send">
							</form>
						</div>
						</div>
							
                    </li>
					
					<?php else: ?>
					
					<li class="nav-item">
                        <a class="nav-link" href="#home">Сайт</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">О</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Меню</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#chef">Наша Команда</a>
                    </li>
					<li class="nav-item">
						<form action="core/out.php" method="POST">
							<button onclick="show1('block')" class="nav-btn" style="color:white"> <?= $_COOKIE['name']?> <?=$_COOKIE['surname']?> Выход </button>
						</form>
					</li>
					
					<?php endIf; ?>
					
                </ul>
            </nav>
            <div class="hero-text text-white w-100 px-2 px-sm-0">
                <h1 class="display-4">Приветствуем</h1>
                <p class="lead mb-4">Великолепная выпечка, какой вы до этого не пробовали</p>
                <a class="btn px-5 mr-2" href="#about">О нас</a>
                <a class="btn px-5 ml-2" href="#menu">Найти</a>
            </div>
        </div>
    </header>

    <main>
        <!-- start of about section -->
        <section class="about" id="about">
            <div class="container">
                <div class="row align-items-lg-center">
                    <div class="col-12 col-md-6 text-center text-md-left" data-aos="fade-right">
                        <div class="section-heading mb-3">
                            <h4>Изучите</h4>
                            <h1 class="display-4">Наша История</h1>
                        </div>
                        <p>Эта пекарня открылась для начала сбора капитала для продвижению к мировому господству, мы
							считаем, что все товары должны быть дешевыми и качественными, когда мир повергнется к нашим 
							ногам, так и будет. Идемте вместе с нами в светлое будущее с вкусными булочками.
                        </p>
                        <a class="btn mt-4 mb-5 mb-md-0" href="#">Узнайте о нас больше</a>
                    </div>
                    <div class="col-md-6 col-12" data-aos="fade-left">
                        <img class="img-fluid" src="images/about-img.jpg" alt="about-img">
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about -->

        <!-- info section -->
        <section class="menu" id="menu">
            <div class="container">
                <div class="row text-center text-white">
                    <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="fade-up">
                        <div class="shop-info">
                            <i class="far fa-clock mb-3"></i>
                            <h1 class="mb-4">Часы работы</h1>
                            <p>Пон по Пят: 7:00 - 22:00</p>
                            <p>Суб и Вос: 8:00 - 23:00</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="fade-down">
                        <div class="shop-info">
                            <i class="fas fa-map-marked-alt mb-3"></i>
                            <h1 class="mb-4">Наш Адрес</h1>
                           <address>
                               Проспект Ветеранов 196<br>
                               Санкт-Петербург
                           </address>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0" data-aos="fade-right">
                        <div class="shop-info">
                            <i class="fas fa-mobile-alt mb-3"></i>
                            <h1 class="mb-4">Контакты</h1>
                            <p>Телефон: +79030979592</p>
                            <p>Почта: serzh-fedorov-2004@mail.ru</p>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
            </div>
            <div class="container-fluid p-0">
                <div class="section-heading my-5 text-center">
                    <h4 class="text-white">Чудная Еда</h4>
                    <h1 class="display-4">Меню</h1>
                </div>
				
				<div class="container mb-5">
		<div class="row">

			<!-- Меню -->
			<div class="col-md-8">
				<div class="row" id="products-container">
					<?php while($info = $res->fetch_assoc()): ?>	
				
					<div class="col-md-6">
						<div class="card mb-4" data-id="<?= $info['id']?>">
							<img class="product-img" src="images/<?= $info['imgSrc']?>" alt="">
							<div class="card-body text-center">
								<h4 class="item-title"><?= $info['title']?></h4>
								<p><small data-items-in-box class="text-muted"><?= $info['itemsInBox']?> шт.</small></p>

								<div class="details-wrapper">

									<!-- Счетчик -->
									<div class="items counter-wrapper">
										<div class="items__control" data-action="minus">-</div>
										<div class="items__current" data-counter>1</div>
										<div class="items__control" data-action="plus">+</div>
									</div>
									<!-- // Счетчик -->

									<div class="price">
										<div class="price__weight"><?= $info['weight']?> г.</div>
										<div class="price__currency"><?= $info['price']?> ₽</div>
									</div>
								</div>

								<button data-cart type="button" class="btn btn-block btn-outline-warning">
									+ в корзину
								</button>

							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			
			<!-- Корзина -->
			<div class="col-md-4">

				<!-- Корзина -->
				<div class="card mb-4">
					<div class="card-body">
						<h5 class="card-title">Ваш заказ</h4>

							<div data-cart-empty class="alert alert-secondary" role="alert">
							Корзина пуста
						</div>

						<!-- cart-wrapper -->
						<div class="cart-wrapper">

						</div>
						<!-- // cart-wrapper -->

						<!-- Стоимость заказа -->
						<div class="cart-total">
							<p data-cart-delivery class="none">
								<span class="h5">Доставка:</span>
								<span class="delivery-cost">250 ₽</span><br>
								<span class="small">Бесплатно при заказе от 600 ₽</span>
							</p>
							<p><span class="h5">Итого:</span>
								<span class="total-price">0</span>
								<span class="rouble">₽</span></p>
						</div>
						<!-- // Стоимость заказа -->

					</div>

					<!-- Оформить заказ -->
					<div id="order-form" class="card-body border-top none">
						<h5 class="card-title">Оформить заказ</h4>
						<form>
							<div class="form-group">Проверьте телефон
								<input type="text" class="form-control" placeholder="Ваш номер телефона" value="<?= $telephone ?>" >
							</div>
							<button type="submit" class="btn btn-primary">Заказать</button>
						</form>
					</div>
					<!-- // Оформить заказ -->

				</div>
				<!-- // Корзина -->

			</div>

		</div>
	</div>
			<?php if(isset($_COOKIE['admin']) && ($_COOKIE['admin'] == 1)): ?>
				
						<div class = "form-menu" style="text-align: center">
							<form action="core/addmenu.php" enctype="multipart/form-data" method="POST">
								<h2 style="color:white">Добавление в меню</h2>
								<div> <input type="text" placeholder="title:" name="title" class="input"></div>
								<div> <input type="text" placeholder="itemsInBox:" name="itemsInBox" class="input"></div>
								<div> <input type="text" placeholder="weight:" name="weight" class="input"></div>
								<div> <input type="text" placeholder="price:" name="price" class="input"></div>
								<div> <input type = "file" name = "img"  class="input"> </input> </div>
								<input type="submit" value="send">
							</form>
						</div>
				
			<?php endIF; ?>

	<!-- Подключаем скрипты для меню -->

	<script src="./js/calcCartPrice.js"></script>
	<script src="./js/toggleCartStatus.js"></script>
	<script src="./js/counter-02.js"></script>
	<script src="./js/cart-02.js"></script>
				
        </section>
        <!-- end of info -->
        <!-- chef section -->
            <section class="chef" id="chef">
                <div class="container">
                    <div class="section-heading my-5 text-center">
                        <h4>Познакомимся</h4>
                        <h1 class="display-4">Собственный Дисней</h1>
                    </div>

                    <div class="row text-center">
                        <div class="col-12 col-md-4" data-aos="fade-right">
                            <img src="images/chef-2.png" alt="" class="img-fluid">
                            <div class="card-body">
                                <h1>Женя Кин</h1>
                                <h6>Специалист по мешанине в стаканах</h6>
                                <p>Белая с натянутой улыбкой</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4" data-aos="fade-up">
                            <img src="images/chef-1.png" alt="" class="img-fluid">
                            <div class="card-body">
                                <h1>Илон Маск</h1>
                                <h6>Манагер</h6>
                                <p>Тут нечего говорить :) </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4" data-aos="fade-left">
                            <img src="images/chef-3.png" alt="" class="img-fluid">
                            <div class="card-body">
                                <h1>Брендон Кариуки</h1>
                                <h6>Печенькодел</h6>
                                <p>Ну как же без негра</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <!-- end of chef section -->


    </main>
	
	<!-- открытие закрытие окон -->
	<script>
		function show(state){
			document.getElementById('window').style.display = state;
			document.getElementById('gray').style.display = state;
		}
		function show1(state){
			document.getElementById('window1').style.display = state;
			document.getElementById('gray1').style.display = state;
		}
	</script>

    <!-- smooth scroll -->
	<script src="smooth-scroll.js"></script>
	<script>
		var scroll = new SmoothScroll('a[href*="#"]');
	</script>

    <script src="https://kit.fontawesome.com/0218909da0.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts.js" type="text/javascript"></script>
	
</body>

</html>