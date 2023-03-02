<?php 
// Connection à la bdd
require ('actions/database.php');

if (isset($_GET['id']) && !empty($_GET['id'])){

    $idMessage = $_GET['id'];

    $checkIfMessageExist = $db->prepare('SELECT * FROM message WHERE id = ?');
    $checkIfMessageExist->execute(array($idMessage));

    if ($checkIfMessageExist->rowCount() > 0) {

        $messageInfos = $checkIfMessageExist->fetch();
        if ($messageInfos['id_author'] == $_SESSION['id']) {
            
            $form_title = $messageInfos['title'];
            $form_message = $messageInfos['message'];
            $form_date = $messageInfos['date_message'];

            $form_message = str_replace('<br />', '', $form_message);

        }else {
            $errorMsg = "Vou n'êtes pas l'auteur de ce message";
        }

    }else{
        $errorMsg = "Aucun message n'a été trouvé !";
    }

}else {
    $errorMsg = "Il n'y a aucune question";
}