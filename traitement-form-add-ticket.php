<?php

if (
    isset($_POST['title']) &&
    isset($_POST['description']) &&
    isset($_POST['level'])
) {

    $title = htmlentities($_POST['title']);
    $description = htmlentities($_POST['description']);

    $pdo->save('tickets', ['user_id'=> $_SESSION['user']['id'],
                        'title' => $title,
                        'description' => $description,
                        'level' => $_POST['level'],
                        ]);

}

header('Location: /todo-list');
exit();