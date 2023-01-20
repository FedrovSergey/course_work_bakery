# Сайт для пекарни
## Возможности:
### Для всех:
1) Регистрация и авторизация пользователей
2) Просмотр всех позиций, предлагаемых пекарней к продаже (внешний вид, вес, количество, цена)
3) Заказ выпечки(если пользователь авторизован)(на почту приходит письмо для оплаты, по телефону вам перезвонят на счет условий(во сколько заберете))
### Для членов администрации:
1) Добавление новых позиций к продаже

## Внешний вид сайта и ссылка:
Ознакомится с видом сайта можно по ссылке: "http://fedorovbakery.test-handyhost.ru/".

## Используемое при реализации:

### Языки
Для написания админ панели и организации взаимодействия клиента с сервером будет использоваться PHP, css и JavaScript.
### Фреймворки
Для создания дизайна сайта будет использоваться фреймворк bootstrap.
### Библиотеки
На стороне сервера используется библиотеки jQuery.

## Возможные пользовательские сценарии:
1) Регистрация: пользователь заходит на сайт, нажимает на кнопку регистрация, вводит имя, фамилию, почту, телефон и пароль, если есть, то админский пароль. После чего все записывается в базу данных и пользователь дальше может авторизоваться.
2) Вход: пользователь вводит логин и пароль, они проверяются в базе данных, и пользователя переносят на главную страницу, с изменениями в зависимости админ он или нет.
3) Составление корзины покупок пользователем: покупатель добавляет в корзину блюда, выставляет их нужное количество и они сохраняются в корзине.
4) Оформление заказа: пользователь проверяет правильность телефона из базы данных и жмет заказать. Ему на почту приходит счет и позиции, через какое-то время ему перезванивают для уточнения заказа и способа оплаты(отправка на почту нужна в случае, если оплата онлайн платежом).
5) Добавление блюда: админ вводит название, вес, количество в 1 позиции, цену и прикрепляет картинку нового блюда.

## Блок схема работы сайта:

1) регистрация:
![registration](https://github.com/FedrovSergey/course_work_bakery/blob/main/forReadme/%D1%80%D0%B5%D0%B3%D0%B8%D1%81%D1%82%D1%80%D0%B0%D1%86%D0%B8%D1%8F%20%D0%BF%D0%B5%D0%BA%D0%B0%D1%80%D0%BD%D1%8F.png)

2) авторизация:
![auth](https://github.com/FedrovSergey/course_work_bakery/blob/main/forReadme/%D0%B0%D0%B2%D1%82%D0%BE%D1%80%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D1%8F%20%D0%BF%D0%B5%D0%BA%D0%B0%D1%80%D0%BD%D1%8F.png)

3) добавление блюд:
![add in menu](https://github.com/FedrovSergey/course_work_bakery/blob/main/forReadme/%D0%B4%D0%BE%D0%B1%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%B1%D0%BB%D1%8E%D0%B4%D0%B0%20%D0%BF%D0%B5%D0%BA%D0%B0%D1%80%D0%BD%D1%8F.png)

4) заказ:
![purchase](https://github.com/FedrovSergey/course_work_bakery/blob/main/forReadme/%D0%B7%D0%B0%D0%BA%D0%B0%D0%B7%20%D0%B1%D0%BB%D1%8E%D0%B4%20%D0%BF%D0%B5%D0%BA%D0%B0%D1%80%D0%BD%D1%8F.png)

## Описание API сервера и хореографии:
#### Примеры запросов:
1) регистрация и авторизация:
![reg and auth](https://github.com/FedrovSergey/course_work_bakery/blob/main/forReadme/%D0%B7%D0%B0%D0%BA%D0%B0%D0%B7%20%D0%B1%D0%BB%D1%8E%D0%B4%20%D0%BF%D0%B5%D0%BA%D0%B0%D1%80%D0%BD%D1%8F.png)

2) заказ:
![purchase1](https://github.com/FedrovSergey/course_work_bakery/blob/main/forReadme/%D0%B7%D0%B0%D0%BA%D0%B0%D0%B7.png)

## Описание структуры базы данных
1) таблица хранения пользователей "user" имеет следующие столбцы:
    1) id - номер пользователя
    2) name - его имя
    3) surname - фамилия
    4) email - почта и логин
    5) password - пароль
    6) telephone - телефон
    7) admin - является ли админом
2) таблица хранения позиций к продаже
    1) id - номер блюда
    2) title - название
    3) itemsInBox - количество в позиции
    4) weight -вес позиции
    5) price - цена
    6) imgSrc - название картинки
    
## Значимые фрагменты кода

1) динамическое выведение меню:
```
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

									<div class="items counter-wrapper">
										<div class="items__control" data-action="minus">-</div>
										<div class="items__current" data-counter>1</div>
										<div class="items__control" data-action="plus">+</div>
									</div>

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
```

2) добавление позиции в меню
```
<?php
require_once 'config.php';

$title = trim($_POST['title']);
$itemsInBox = trim($_POST['itemsInBox']);
$weight = trim($_POST['weight']);
$price = trim($_POST['price']);



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn, 'utf8');

$number = "SELECT MAX(id) FROM menu";
$number = $conn->query($number);
$number = $number->fetch_assoc();
$number['MAX(id)'] = $number['MAX(id)'] + 1;

$img_name = "menu-item-".$number['MAX(id)'].".jpeg";
		
$file = $_FILES["img"];
			
if ($file["name"] != "") {
			
	if ($file["error"] != 0) {
		header("Location: http://localhost/main.php?message=С файлом что-то не так!");
		exit;
	}
			
	$types = array("image/jpeg", "image/jpg");
	if (!in_array($file["type"], $types)) {
		header("Location: http://localhost/main.php?message=Недопустимый формат файла!");
		exit;
	}
		
	if (!move_uploaded_file($file["tmp_name"], "images/".$img_name)) {
		header("Location: http://localhost/main.php?message=С картинкой что-то не так!");
		exit;
	}
}

$sql = "INSERT INTO menu (title, itemsInBox, weight, price, imgSRC) VALUES ('".$title."', '".$itemsInBox."', '".$weight."', '".$price."', '".$img_name."')";

if ($conn->query($sql) === TRUE) {
    header('Location: /main.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>		
```
3) функция считывания данных и отправки запроса на заказ
```
function makePurchase(){
	
const cartWrapper =  document.querySelector('.cart-wrapper');

let str = '';
		let allCart = document.querySelectorAll('.cart-item')
		allCart.forEach(function(card) {
			
			const productInfo = {
				id: card.dataset.id,
				imgSrc: card.querySelector('.product-img').getAttribute('src'),
				title: card.querySelector('.item-title').innerText,
				itemsInBox: card.querySelector('[data-items-in-box]').innerText,
				weight: card.querySelector('.price__weight').innerText,
				price: card.querySelector('.price__currency').innerText,
				counter: card.querySelector('[data-counter]').innerText,
			};
			
			str = str + productInfo.title + ':';
			str =  str + productInfo.counter + '; ';
			
		});
		
	const totalPriceEl = document.querySelector('.total-price');
	
	str = str + 'Суммарная стоимость = ' + totalPriceEl;
	
	let xhr = new XMLHttpRequest();
    xhr.open("POST", "core/addPurchase.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              console.log(this.responseText);
          }
      }
    }
    xhr.send(str);

}
```
   4) расчет стоимости заказа и доставки
```
function calcCartPriceAndDelivery() {
	const cartWrapper = document.querySelector('.cart-wrapper');
	const priceElements = cartWrapper.querySelectorAll('.price__currency');
	const totalPriceEl = document.querySelector('.total-price');
	const deliveryCost = document.querySelector('.delivery-cost');
	const cartDelivery = document.querySelector('[data-cart-delivery]');

	let priceTotal = 0;

	// Обходим все блоки с ценами в корзине
	priceElements.forEach(function (item) {
		// Находим количество товара
		const amountEl = item.closest('.cart-item').querySelector('[data-counter]');
		// Добавляем стоимость товара в общую стоимость (кол-во * цену)
		priceTotal += parseInt(item.innerText) * parseInt(amountEl.innerText);
	});

	// Отображаем цену на странице
	totalPriceEl.innerText = priceTotal;

	// Скрываем / Показываем блок со стоимостью доставки
	if (priceTotal > 0) {
		cartDelivery.classList.remove('none');
	} else {
		cartDelivery.classList.add('none');
	}

	// Указываем стоимость доставки
	if (priceTotal >= 1500) {
		deliveryCost.classList.add('free');
		deliveryCost.innerText = 'бесплатно';
	} else {
		deliveryCost.classList.remove('free');
		deliveryCost.innerText = '250 ₽';
	}
}
```
5) отображение пустой корзины, если все от туда удалили
```
function toggleCartStatus() {

    const cartWrapper = document.querySelector('.cart-wrapper');
    const cartEmptyBadge = document.querySelector('[data-cart-empty]');
    const orderForm = document.querySelector('#order-form');

    if (cartWrapper.children.length > 0) {
        console.log('FULL');
        cartEmptyBadge.classList.add('none');
        orderForm.classList.remove('none');
    } else {
        console.log('EMPTY');
        cartEmptyBadge.classList.remove('none');
        orderForm.classList.add('none');
    }

}
```


