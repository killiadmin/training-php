<?php 

//Connection à la bdd
require ('actions/database.php');

//Si l'input validate est demander
if(isset($_POST['validate'])) {

    if(!empty($_POST['title']) && !empty($_POST['message'])){
        
        $newMessageTitle = htmlspecialchars($_POST['title']);
        $newMessageContent=nl2br(htmlspecialchars($_POST['message']));

        $editMessageForum = $db->prepare('UPDATE message SET title = ?, message = ? WHERE id = ?');
        $editMessageForum->execute(array($newMessageTitle, $newMessageContent, $idMessage));

        header("Location: profil.php");

    }else {

        $errorMsg = "Les champs ne sont pas tous complétés !";
    };

};