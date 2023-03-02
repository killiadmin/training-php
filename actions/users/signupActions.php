<?php
session_start();

require("actions/database.php");

//Validation du formulaire

if (isset($_POST["validate"])){

    //On valide les champs si ils ne sont pas vide 

    if(!empty($_POST["nickname"]) && !empty($_POST["firstname"]) && !empty($_POST["name"]) && !empty($_POST["password"])) {

        //On récupère les données de l'utilisateur

        $user_nickname = htmlspecialchars($_POST["nickname"]);
        $user_name = htmlspecialchars($_POST["name"]);
        $user_firstname = htmlspecialchars($_POST["firstname"]);
        $user_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        //On valide si l'utilisateur n'extsiste pas déjà dans la bdd 

        $checkIfUserExists = $db ->prepare("SELECT nickname FROM users WHERE nickname = ?");
        $checkIfUserExists ->execute(array($user_nickname));

        //Si l'utilisateur est unique on lui incrément un id

        if ($checkIfUserExists->rowCount() == 0) {

            //On insert les données du formulaire dans notre bdd 
            
            $insertUserOnDb = $db->prepare("INSERT INTO users(nickname, firstname, name, password)VALUES(?, ?, ?, ?)");
            $insertUserOnDb-> execute(array($user_nickname, $user_name, $user_firstname, $user_password));

            // On récupère les données de l'utilisateur enregistrer

            $checkInfosUser = $db->prepare("SELECT id, nickname, name, firstname FROM users WHERE nickname = ? && name = ? && firstname = ?");
            $checkInfosUser-> execute(array($user_nickname, $user_name, $user_firstname));

            $usersInfos = $checkInfosUser ->fetch();

            // On authentifie l'utilisateur

            $_SESSION["auth"] = true;
            $_SESSION["id"] = $usersInfos['id'];
            $_SESSION["nickname"] = $usersInfos['nickname'];
            $_SESSION["name"] = $usersInfos['name'];
            $_SESSION["firstname"] = $usersInfos['firstname'];

            // On redirige l'utilisateur vers la page d'acceuil

            header("Location: index.php");

        }else{
            $errorMsg = "L'utilisateur existe déjà !";
        }

    }else {
        $errorMsg = "Un problème est survenue lors de votre inscription sur notre forum!";
    };
}