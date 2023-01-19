document.querySelector('#signup-submit').onclick = function (event) {
    event.preventDefault();
    let name = document.querySelector('#signup-name').value;
	let surname = document.querySelector('#signup-surname').value;
    let email = document.querySelector('#signup-email').value;
    let pass = document.querySelector('#signup-pass').value;
    let telephone = document.querySelector('#signup-telephone').value;
    let admin = document.querySelectorAll('.admin');
    for (let i = 0; i < admin.length; i++) {
        if (admin[i].checked) {
            admin = admin[i].value;
            break;
        }
    }
	if(admin == "yes" && document.querySelector('#signup-adminpass').value == "admin"){
		admin = 1;
	}
	else{
		admin = 0;
	}
    let data = {
        "name": name,
		"surname": surname,
		"email": email,
        "pass": pass,
        "telephone": telephone,
        "admin": admin,
    }

    ajax('core/signup.php', 'POST', login, data);

    function login(result) {
        console.log(result);
        if (result == 2) {
            alert('Заполните поля');
        }
        else if (result == 1) {
            alert('Успех. Теперь можно войти!');
        }
        else {
            alert('Ошибка, повторите регистрацию позже!');
        }
    }
}