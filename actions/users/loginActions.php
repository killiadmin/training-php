<?php
session_start();
//Connection à la base de données
require('actions/database.php');

//Si l'input 'validate est appelé'
if (isset($_POST["validate"])){

    //Valide les champs si ils ne sont pas vides 

    if(!empty($_POST["nickname"]) && !empty($_POST["password"])) {

        //Récupère les données de l'utilisateur qu'il a rentrer dans les champs

        $user_nickname = htmlspecialchars($_POST["nickname"]);
        $user_password = htmlspecialchars($_POST["password"]);

        //Vérifier si l'utilisateur existe dans notre bdd

        $checkIfUserExist = $db->prepare('SELECT * FROM users WHERE nickname = ?');
        $checkIfUserExist->execute(array($user_nickname));

        //Si l'utilisateur existe on va verifier son password

        if($checkIfUserExist->rowCount() > 0 ){

            $usersInfos = $checkIfUserExist->fetch();
            if(password_verify($user_password, $usersInfos["password"])){

            //Les infos sont corrects donc l'utilisateur est diriger vers la page d'acceuil

                $_SESSION["auth"] = true;
                $_SESSION["id"] = $usersInfos['id'];
                $_SESSION["nickname"] = $usersInfos['nickname'];
                $_SESSION["name"] = $usersInfos['name'];
                $_SESSION["firstname"] = $usersInfos['firstname'];

                header("Location: index.php ");

            }else{
                $errorMsg = "Votre mot de passe est incorect";
            }

        }else {
            $errorMsg = "Vos identidiants sont incorrect";

        }
        
    }else {
        $errorMsg = "Un problème est survenue lors de votre inscription sur notre forum!";
    }};