<?php

require_once('errors.php');

session_start();
$login = filter_var(trim($_POST['login']));
$password = $_POST['password'];




//Подключение к бд
$mysql = new mysqli('127.0.0.1','root','','users');
if ($mysql) {
    //Авторизация
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
    //Переводим объект в массив
    $user = $result->fetch_assoc();
    //Выходим из бд
    $mysql->close();
    //Проверка полуения пользователя
    if(isset($user)){
        //Проверка соответствия пароля
        if (password_verify($password,$user['password'])) {
            $logins['login'] = "Успешное подключение";
            //Начало сесси
            $_SESSION['user'] = ['login' => $user['login'], 'status' => $user['status'], 'email' => $user['email']];
            header('Location: index.php');
        }else {
            $errors['errorPasswordLogin'] = "Пароль не верный";
            header('Location: login.php');
            exit(); 
        }
    }else{
        $errors['errorAouto'] = "пользователь не найден";
        header('Location: login.php');
        exit();     
    }
}else{
    $errors['errorLogin'] ='Подключение не произошло';
    header('Location: login.php');
    exit();
}

