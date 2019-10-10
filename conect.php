<?php
session_start();

require_once('errors.php');


$mail = filter_var(trim($_POST['email']));
$password = password_hash($_POST['password'], PASSWORD_BCRYPT) ;
$login = $_POST['login'];
$status = 'user';

//var_dump($_POST);

//подключение к бд
$mysql = new mysqli('127.0.0.1','root','','users');
if ($mysql) {
  //echo 'Успешное подключение';
  //Запись в бд
  $mysql->query("INSERT INTO `users` (`email`,`password`,`login`,`status`) VALUES('$mail','$password','$login','$status')");
  //Выход из бд
  $mysql->close();
  //Начало сессии
  if (!empty($_POST['login']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password'])) {
    $_SESSION['user'] = ['email' => $_POST['email'], 'password' => $_POST['password']];
    header('Location: index.php');
  }
}else{
   $errors['errorsConect'] = ('Подключение не произошло');
    header('Location: index.php');
}