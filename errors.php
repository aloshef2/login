<?php
session_start();
$errors = [];
$logins = [];



if (!empty($_POST)) {
  if (empty($_POST['login'])) {
    $errors['errorlogin'] = 'Задайте логин';
  }elseif(mb_strlen($_POST['login']) <= 3 || mb_strlen($_POST['login']) > 30) {
    $errors['errorlogin'] = 'Не допустимая длина имени';
  }
  if (empty($_POST['password'])) {
  $errors['errorpassword'] = 'Не верный пароль';
  }elseif(mb_strlen($_POST['password']) < 6 || mb_strlen($_POST['password']) > 250){
    $errors['errorpassword'] = 'Пароль должен содержать не мене 6 символов';
  }
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['erroremail'] = 'Не верный email';
  }
  
}

//print_r($errors);