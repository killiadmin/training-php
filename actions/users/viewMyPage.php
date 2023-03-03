<?php 

require('actions/database.php');

if (isset($_GET['id']) && !empty($_GET['id'])){

    $idUser = $_GET['id'];

    $allInfoUser = $db->prepare('SELECT * FROM users WHERE id = ?');
    $allInfoUser->execute(array($idUser));

    if ($allInfoUser->rowCount() > 0) {
        
        $usersInfos = $allInfoUser->fetch();

        $user_nickname = $usersInfos['nickname'];
        $user_firstname = $usersInfos['firstname'];
        $user_name = $usersInfos['name'];

        $getUserMessage = $db->prepare('SELECT * FROM message WHERE id_author = ?');
        $getUserMessage->execute(array($idUser));
    
    }else{
        $errorMsg = "Cet Utilisateur n'existe pas";
    }





}else {
    echo 'Aucun utilisateur a été trouvé';
};