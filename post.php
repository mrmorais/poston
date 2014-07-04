<?php
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db ('poston', $conn);
class post {
	function select($status) {
		$sql = "SELECT * FROM `post` WHERE `status`='".$status."'";
		$query = mysql_query($sql);
		while ($row = mysql_fetch_array($query)) {
			echo "<div class='dragme'>
			<div class='".$row['tipo']." dragme'>
			<div class='control'>";
			
			if ($row['status']=="fazer") {
				echo "<a href='?update=".$row['id']."'>fazer</a>
				<a href='?delete=".$row['id']."&status=fazer'>X</a>";
			} elseif($row['status']=="fazendo") {
				echo "<a href='?finish=".$row['id']."'>finalizar</a>
				<a href='?delete=".$row['id']."&status=fazendo'>X</a>";
			}
			
			
			echo "</div>
			".utf8_decode($row['conteudo'])."</div>
			</div>";
		}
	}
	function newPost($conteudo, $prioridade) {
		$sqlA = "INSERT INTO `poston`.`post` (`id`, `conteudo`, `status`, `tipo`) VALUES (NULL, '".utf8_encode($conteudo)."', 'fazer', '".$prioridade."')";
		$queryA = mysql_query($sqlA);
		if($queryA) {
			header("Location: index.php?fazer");
		} else {
			echo "Que puta aplicação, né?";
		}
	}
	function deletePost($post, $status) {
		$sqlB = "DELETE FROM `poston`.`post` WHERE `post`.`id` = ".$post;
		$queryB = mysql_query($sqlB);
		header("Location: ?".$status);
	}
	function updateStatus($post) {
		$sqlC = "UPDATE  `poston`.`post` SET `status` =  'fazendo' WHERE  `post`.`id` =".$post;
		$queryC = mysql_query($sqlC);
		header("Location: ?fazendo");
	}
	function finishPost($post) {
		$sqlC = "UPDATE  `poston`.`post` SET `status` =  'feito' WHERE  `post`.`id` =".$post;
		$queryC = mysql_query($sqlC);
		header("Location: ?feito");
	}
}


?>
