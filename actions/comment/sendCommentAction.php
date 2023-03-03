<?php 

require('actions/database.php');

if (isset($_POST['validate']) && !empty($_POST['comment'])){

    $user_comment = nl2br(htmlspecialchars($_POST['comment']));

    $insertComment = $db->prepare('INSERT INTO comment(id_author, nickname_author, id_message, comment_content)VALUES(?, ?, ?, ?)');
    $insertComment->execute(array($_SESSION['id'], $_SESSION['nickname'], $_GET['id'], $user_comment));
};
