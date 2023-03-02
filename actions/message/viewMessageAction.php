<?php

require('actions/database.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idOfTheQuestions = $_GET['id'];
    
    $checkIfThisMessageExist = $db->prepare('SELECT * FROM message WHERE id = ?');
    $checkIfThisMessageExist->execute(array($idOfTheQuestions));

    if ($checkIfThisMessageExist->rowCount() > 0){

        $messageInfos = $checkIfThisMessageExist->fetch();

        $message_title = $messageInfos['title'];
        $message_content = $messageInfos['message'];
        $message_idAuthor = $messageInfos['id_author'];
        $message_nicknameAuthor = $messageInfos['nickname_author'];
        $message_date = $messageInfos['date_message'];

    }else {
        $errorMsg = "Votre message n'existe pas";
    }
}else {
    echo "Aucun message n'a été trouvé";
};