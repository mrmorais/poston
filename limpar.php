<?php
require_once('post.php');
$sql = "DELETE FROM `poston`.`post` WHERE `post`.`status` = 'feito'";
$query = mysql_query($sql);
header("Location: index.php?feito");
?>
