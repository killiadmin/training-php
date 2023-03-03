<?php 

require ('actions/database.php');

$getAllComments = $db->prepare('SELECT  id, id_author, nickname_author, id_message, comment_content FROM comment WHERE id_message = ? ORDER BY id DESC');
$getAllComments->execute(array($_GET['id']));