<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title><?=$this->getTitle()?></title>
        <link href="style/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<script src='js/core.js' defer></script>
</head> 
    </head> 
    <body>
        <header>
			<? if ($this->data->userId !== null) {?>
			<div>Вы вошли как <?= $this->data->userLogin ?></div>
			<a href='index.php?c=personal_cabinet' class='btn btn-default'>Личный кабинет</a>
			<a href='index.php?c=logout' class='btn btn-primary'>ВЫЙТИ</a>
			<? } else {?>
			<a href='index.php?c=login' class='btn btn-default'>Войти</a>
			<a href='index.php?c=register' class='btn btn-primary'>Зарегистрироваться</a>
			<?}?>
            
        </header>
		<?$this->getContent()?>
    </body>
</html>