<?php 

require('actions/database.php');

if (isset($_POST['validate'])){

    if (!empty($_POST['title']) && $_POST['message']) {

        $message_title = htmlspecialchars($_POST['title']);
        $message_content = nl2br(htmlspecialchars($_POST['message']));
        $message_date = date("Y-m-d");
        $id_user_author = $_SESSION["id"];
        $nickname_user_author = $_SESSION["nickname"];

        $insertMessage = $db->prepare("INSERT INTO message(title, message, id_author, nickname_author, date_message)VALUES(?, ?, ?, ?, ?)");
        $insertMessage->execute(
            array(
                $message_title,
                $message_content,
                $id_user_author,
                $nickname_user_author,
                $message_date
                )
            );

            $successMsg = "Votre message a bien été envoyé !";

    }else {
        $errorMsg ="Votre message est incomplet !";
    };
};