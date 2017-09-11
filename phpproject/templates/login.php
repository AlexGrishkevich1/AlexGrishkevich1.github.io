
        <div class="container mlogin">
            <div>
                <h1>Вход</h1>
                <form action="" id="loginform" method="post" name="loginform">
                    <label for="email">email
                    <input id="email" name="email" type="text"></label><br>
                    <label for="password">Пароль
                    <input id="password" name="password" type="password" value=""></label> <br>
                    <input id="postlogin" name="postlogin" type="submit" value="Залогиниться">
                </form>
            </div>
        </div>
         <?=$this->data->warning;?>