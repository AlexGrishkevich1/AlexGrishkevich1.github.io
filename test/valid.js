function provGuest() {
    var form = document.forms.guest;
    var input_name = form.name;
    var input_email = form.email;
    if (input_name.value == "") {
        alert("Введите имя!");
        return(false);
    } else if (input_name.value.indexOf(" ") !== -1) {
        alert("Имя должно быть без пробелов");
        return(false);
    };
    if (input_email.value=='') {
        alert("Введите email");
        return(false);
    } else if (input_email.value.indexOf(" ") !== -1) {
        alert("Email должен быть без пробелов");
        return(false);
    };
    alert('Данные верны. Отправляем.');
}
        