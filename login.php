<?php

session_start();
require_once('errors.php');
if (isset($_SESSION['user'])) {
  header('Location: index.php');
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="mid">
      <div class="card">
        <div class="gradient"></div>
        <div class="front">
            <form action="conect.php" method="post">
              <div>
                
                <input type="text" name="login" placeholder="" value="<?php echo $_POST['login']; ?>" required="">
                <label >login</label>
                <?php if (isset($errors)) {echo $errors['errorlogin'];}  ?>
              </div>
              <div>
                
                <input type="text" name="email" value=" <?php echo $_POST['email'];?> " required="">
                <label >email</label>
                <?php if (isset($errors)) {echo $errors['erroremail'];}  ?>
              </div>
              <div>
                
                <input type="password" name="password" value=" <?php echo $_POST['password']; ?> " required="">
                <label >password</label>
                <?php if (isset($errors)) { echo $errors['errorpassword']; }?>
              </div>
              <button type="submit" name="button">Зарегистривоваться</button>
              <div class="link flip"><a href="#" class="">Войти</a></div>
            </form>

        </div>
        <div class="back">
          <form action="check.php" method="post">
            <div class="errors"><?php  if (isset($errors)):?><?php echo $errors['errorAouto'];?><?php else:?><?php echo $logins['login'];?><?php endif ?></div>
              <div>
                
                <input type="text" name="login" required="">
                <label >login</label>
              </div>
              <div>
                
                <input type="password" name="password" required="">
                <label>password</label>
                <?php if (isset($errors)){echo $errors['errorPasswordLogin']; }?>
              </div>
              <button type="submit">Авторизация</button>
              <div class="link flip"><a href="#" class="">Регистрация</a></div> 
          </form>
        </div>
      </div>
    </div>
    <script>
      $(".flip").click(function(event){
            $(".card").toggleClass("active");
        });
    </script>
  </body>
</html>
