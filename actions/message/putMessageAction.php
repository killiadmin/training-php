<?php 

require ('actions/database.php');

if (isset($_GET['id']) && !empty($_GET['id'])){

    $idMessage = $_GET['id'];

    $checkIfMessageExist = $db->prepare('SELECT *, id_author FROM message WHERE id = ?');
    $checkIfMessageExist->execute(array($idMessage));

    if ($checkIfMessageExist->rowCount() > 0) {

        $messageInfos = $checkIfMessageExist->fetch();
        if ($messageInfos['id_author'] == $idMessage) {
            
            $form_title = $messageInfos['title'];
            $form_message = $messageInfos['message'];
            $form_date = $messageInfos['date_message'];

        }else {
            $errorMsg = "Vou n'êtes pas l'auteur de ce message";
        }

    }else{
        $errorMsg = "Aucun message n'a été trouvé !";
    }

}else {
    $errorMsg = "Il n'y a aucune question";
}