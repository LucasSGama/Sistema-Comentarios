<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : null;

    $pdo = new PDO('mysql:host=localhost; dbname=bd-comment-video', 'root', '');

    $stmt = $pdo->prepare('INSERT INTO comments (name, comment) VALUES ("'.$name.'", "'.$comment.'")');
    $stmt->execute();

    if($stmt->rowCount() >= 1) {
        echo json_encode('Comentário Salvo com sucesso');
    } else {
        echo json_encode('Falha ao salvar comentário');
    }
?>