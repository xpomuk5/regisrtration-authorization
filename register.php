<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();
require_once './classes/Auth.class.php';

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Ajax Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Вы уже зарегистрированы</h1>

      <form class="ajax" method="post" action="./ajax.php" id="ff">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Выйти</button>
          </div>
      </form>

      <?php else: ?>

      <form class="form-signin ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Пожалуйста, войдите в систему</h2>
        <div class="form__field">
        <input name="username" type="text" class="input-block-level" placeholder="Login" autofocus 
        required pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}">
        <span class="form__error">Это поле должно содержать минимум 6 символов, только буквы и цифры</span>
        </div>
        <div>
        <input name="password1" type="password" class="input-block-level" placeholder="Password"
        required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w]).{6,}">
        <span class="form__error">Это поле должно содержать минимум 6 символов, 
        обязательно должно содержать цифру, буквы в разных регистрах и спец символ (знаки)</span>
        </div>
        <div>
        <input name="password2" type="password" class="input-block-level" placeholder="Confirm password" required>
        </div>
		    <div>
        <input name="email" type="text" class="input-block-level" placeholder="Email" autofocus
        required pattern="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$">
        <span class="form__error">Неверный формат</span>
        </div>
        <div>
        <input name="Name" type="text" class="input-block-level" placeholder="Name" autofocus
        required pattern="(?=.*\d)(?=.*[A-Za-z]).{2,}">
        <span class="form__error">Это поле должно содержать минимум 2 символа, только буквы и цифры</span>
        </div>
        <input type="hidden" name="act" value="register">
        <button class="btn btn-large btn-primary" type="submit">Зарегистрироваться</button>
        <div class="alert alert-info" style="margin-top:15px;">
            <p>У вас уже есть аккаунт? <a href="/">Войти.</a>
        </div>
      </form>



      <?php endif; ?>

    </div> <!-- /container -->

    <script src="./vendor/jquery-3.6.0.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>
