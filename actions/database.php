<?php
try{
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', 'root');
}catch(Exception $e){
    die("Il y a une erreur lors de la connection à la base de données!");
}
