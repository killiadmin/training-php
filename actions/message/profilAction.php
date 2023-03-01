<?php 

require("actions/database.php");

$getAllMessages = $db->prepare("SELECT id, title, message FROM message WHERE id_author = ? ORDER BY id DESC");
$getAllMessages->execute(array($_SESSION['id']));