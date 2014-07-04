<html>
<head>
<title>Poston - Adicionar novo post it</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h3>Adicionar novo Post it</h3>
<form name="form" method="POST" action="?send=true">
Conteúdo:<br><textarea name="conteudo" cols="40" rows="6" style="max-width: 400px; max-height: 200px;"></textarea><br>

<div class="exemplo dragme normal"><input type="radio" name="prioridade" value="normal" checked="checked">Normal</input></div>
<div class="exemplo dragme urgente"><input type="radio" name="prioridade" value="urgente">Urgente</div><br>
<input type="submit">
</form>
<?php
require_once('post.php');
if (isset($_GET['send'])) {
	if (isset($_POST['conteudo']) && isset($_POST['prioridade']) && !empty($_POST['conteudo'])) {
		$post = new post();
		$post -> newPost($_POST['conteudo'], $_POST['prioridade']);
	}
}
?>
</body>
</html>
