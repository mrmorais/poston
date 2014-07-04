<html>
	<head>
		<title>Bem vindo ao Poston</title>
		<script src="dragme.js"></script>
		<script src="jquery.js"></script>
		<script>
			function fazer() {
				$('#fazendo').hide();
				$('#feito').hide();
				$('#fazer').fadeIn();
				document.getElementById('menu').innerHTML = "<a href='#' class='atual'>A FAZER</a><a href='#' class='disponivel' onClick='fazendo();'>FAZENDO</a><a href='#' class='disponivel' onClick='feito();'>FEITO</a><div id='add'><a href='adicionar.php'><button>Adicionar</button></a></div>";
			}
			function fazendo() {
				$('#fazendo').fadeIn();
				$('#feito').hide();
				$('#fazer').hide();
				document.getElementById('menu').innerHTML = "<a href='#' class='disponivel' onClick='fazer();' >A FAZER</a><a href='#' class='atual' onClick='fazendo();'>FAZENDO</a><a href='#' class='disponivel' onClick='feito();'>FEITO</a>";
			}
			function feito() {
				$('#fazendo').hide();
				$('#feito').fadeIn();
				$('#fazer').hide();
				document.getElementById('menu').innerHTML = "<a href='#' class='disponivel' onClick='fazer();' >A FAZER</a><a href='#' class='disponivel' onClick='fazendo();'>FAZENDO</a><a href='#' class='atual'>FEITO</a><div id='add'><a href='limpar.php'><button>Limpar</button></a></div>";
			}
			
		</script>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<?php 
		require_once('post.php');
		$post = new post();
		if (isset($_GET['delete']) && isset($_GET['status'])) {
			$post -> deletePost($_GET['delete'], $_GET['status']);
		}
		if (isset($_GET['update'])) {
			$post -> updateStatus($_GET['update']);
		}
		if (isset($_GET['finish'])) {
			$post -> finishPost($_GET['finish']);
		}
		
		if(isset($_GET['fazer'])) {
			echo "<body onLoad='fazer();'>";
		} elseif(isset($_GET['fazendo'])) {
			echo "<body onLoad='fazendo();'>";
		} else {
			echo "<body onLoad='feito();'>";
		}
	?>
	<div id="menu">
		<a href="#" class="disponivel" onClick="fazer();" >A FAZER</a>
		<a href="#" class="atual" onClick="fazendo();">FAZENDO</a>
		<a href="#" class="disponivel" onClick="feito();">FEITO</a>
	</div>
	
	
	<div id = "fazer" class="board">
		<?php $post -> select('fazer'); ?>
	</div>
	<div id = "fazendo" class="board">
		<?php $post -> select('fazendo'); ?>
	</div>
	<div id = "feito" class="board">
		<?php $post -> select('feito'); ?>
	</div>
 
</div>

	</body>
</html>
