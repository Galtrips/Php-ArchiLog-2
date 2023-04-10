<?php

if (!empty($_POST['login']) && !empty($_POST['password'])) {


//    $test = $pdo->exec("UPDATE users SET password='1234' ");
//    var_dump($test);die();

    $user = $pdo->getOne('users', ['conditions' => 
                                    [
                                        'name' => $_POST['login'],
                                        'password' => $_POST['password'],
                                    ]]);
   
    if ($user) {
        $_SESSION['user'] = $user;
    }
}
header('Location: /');
exit();