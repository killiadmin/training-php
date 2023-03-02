<?php 

require ('actions/database.php');

$getAllMessage = $db->query('SELECT id, title, message, id_author, nickname_author, date_message FROM message ORDER BY id DESC LIMIT 0,5');

if(isset($_GET['search'])&& !empty($_GET['search'])){

    $userSearch = $_GET['search'];

    $getAllMessage = $db->query("SELECT id, title, message, id_author, nickname_author, date_message FROM message WHERE title LIKE '%".$userSearch."%' ORDER BY id DESC");

}