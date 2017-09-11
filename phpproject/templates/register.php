<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8"> 
        <title></title>
        <link href="css/style.css"rel="stylesheet">
    </head>
    <body>
        <div class="">
			
            <div>
                <h1>Регистрация</h1>
				<? if (strlen($this->data->warning) > 0) {?> 
				<div> <?= $this->data->warning ?> </div>
				<?} ?>
                <form action="index.php?c=register" id="registerform" method="post" name="registerform">
                <div>
                    <label for="email">email
                        <input class="input" id="email" name="email" type="email" value="<?=htmlspecialchars($this->data->email)?>">
                    </label></div>
					<div><?=$this->data->emailValidationError; ?></div>
                   <div> <label for="login">login
                        <input class="input" id="login" name="login" type="text" value="<?=htmlspecialchars($this->data->login)?>">
                    </label></div>
					<div><?=$this->data->loginValidationError; ?></div>
                   <div> <label for="password">password
                        <input class="input" id="password" name="password" type="password" value="">
                    </label></div>
					<div><?=$this->data->passwordValidationError; ?></div>
                   <div> <label for="name">name
                        <input class="input" id="name" name="name" type="text" value="<?=htmlspecialchars($this->data->name)?>">
                    </label></div>
					<div><?=$this->data->nameValidationError; ?></div>
                    <br>
                    <input class="button" id="register" name="register" type="submit" value="Зарегистрироваться">
                </form>
			
            </div>
        </div>
        <footer>
        </footer>
    </body>
</html>