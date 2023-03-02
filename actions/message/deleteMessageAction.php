<?php 

session_start();
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
};

require ('../database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

    $idMessage = $_GET['id'];
    $checkMessageExists = $db->prepare('SELECT id_author FROM message WHERE id = ?');
    $checkMessageExists->execute(array($idMessage));

    if($checkMessageExists->rowCount() > 0){

        $messageInfos = $checkMessageExists->fetch();
        if ($messageInfos['id_author'] == $_SESSION['id']) {

            $deleleThisMessage = $db->prepare('DELETE FROM message WHERE id = ?');
            $deleleThisMessage->execute(array($idMessage));

            header('Location: ../../profil.php');

        }else {
            echo "Vous n'êtes pas l'auteur de ce message!";
        };

    }else {
        echo "Aucune question n'a été trouvée";
    };

}else{
    echo "Il n'y a aucun message à supprimer";
};