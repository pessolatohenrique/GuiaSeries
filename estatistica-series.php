<?php 
	require_once("classes/Usuario.php");
	require_once("classes/Obra.php");
	require_once("classes/Genero.php");
	require_once("classes/Serie.php");
	require_once("banco/conexao.php");
	require_once("banco/SerieDAO.php");
	$usuarioObj = new Usuario();
	$usuarioObj->protegePagina();
	$usuario_id = $_SESSION['idUsuario'];
	$serieDAO = new SerieDAO($conexao);
	$generos = $serieDAO->geraEstatisticaPorGenero($usuario_id);
	/*Arrays referentes à outras estatísticas*/
	$maiorNota = $serieDAO->geraEstatistica($usuario_id,"s.avaliacao DESC");
	$menorNota = $serieDAO->geraEstatistica($usuario_id,"s.avaliacao ASC");
	$maisRecente = $serieDAO->geraEstatistica($usuario_id,"s.anoEstreia DESC");
	$maisAntiga = $serieDAO->geraEstatistica($usuario_id,"s.anoEstreia ASC");
	$maisTemporadas = $serieDAO->geraEstatistica($usuario_id,"s.totalTemporadas DESC");
	$menosTemporadas = $serieDAO->geraEstatistica($usuario_id,"s.totalTemporadas ASC");
?>
<!DOCTYPE html>
<html>
<head>
	<title>GuiaSerie | Estatísticas</title>
	<style type="text/css">
		.table tr > td:first-child{
			width: 55%;
		}
	</style>
	<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	<?php require_once("include/cabecalho-bootstrap.php"); ?>
	<!-- INÍCIO GOOGLE CHARTS !-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<?php require_once("js/graficos/temporada-coluna.php"); ?>
	<?php require_once("js/graficos/temporada-pizza.php"); ?>
	<?php require_once("js/graficos/serie-quantidade-pizza.php"); ?>
	<!-- FIM GOOGLE CHARTS !-->
</head>
<body>
	<div class="container">
		<h1>Estatísticas - Séries Assistidas</h1>
		<div class="panel panel-primary">
			<div class="panel-heading">Séries por Gênero</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<table class="table table-striped table-bordered">
							<tr>
								<th>Gênero</th>
								<th>Quantidade</th>
								<th>Temporadas</th>
							</tr>
							<?php foreach($generos as $genero): ?>
							<tr>
								<td><?=$genero['genero_nome']?></td>
								<td><?=$genero['total_genero']?></td>
								<td><?=$genero['temporada_genero']?></td>
							</tr>
							<?php endforeach; ?>
						</table> 
					</div>
					<div class="col-md-4">
						<div id="grafico-barra-temporada"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div id="grafico-pizza-temporada"></div>
					</div>
					<div class="col-md-4">
						<div id="grafico-pizza-quantidade"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">Outras Estatísticas</div>
			<div class="panel-body">
				<p>
					<div class="row">
						<div class="col-md-6">
							<strong>Série com a maior nota: </strong>
							<a href="consulta-serie.php?id=<?=$maiorNota[0]->getId()?>">
								<?=$maiorNota[0]->getNome()?>
							</a>, nota: <?=$maiorNota[0]->getAvaliacaoIMDB()?>
						</div>
						<div class="col-md-6">
							<strong>Série com a menor nota: </strong>
							<a href="consulta-serie.php?id=<?=$menorNota[0]->getId()?>">
								<?=$menorNota[0]->getNome()?>
							</a>, nota: <?=$menorNota[0]->getAvaliacaoIMDB()?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<strong>Série mais recente:</strong>
							<a href="consulta-serie.php?id=<?=$maisRecente[0]->getId()?>">
								<?=$maisRecente[0]->getNome()?>
							</a>, estreou em <?=$maisRecente[0]->getAnoEstreia()?>
						</div>
						<div class="col-md-6">
							<strong>Série mais antiga:</strong>
							<a href="consulta-serie.php?id=<?=$maisAntiga[0]->getId()?>">
								<?=$maisAntiga[0]->getNome()?>
							</a>, estreou em <?=$maisAntiga[0]->getAnoEstreia()?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<strong>Série com mais temporadas:</strong>
							<a href="consulta-serie.php?id=<?=$maisTemporadas[0]->getId()?>">
								<?=$maisTemporadas[0]->getNome()?>
							</a>, com <?=$maisTemporadas[0]->getTemporadas()?> temporadas
						</div>
						<div class="col-md-6">
							<strong>Série com menos temporadas:</strong>
							<a href="consulta-serie.php?id=<?=$menosTemporadas[0]->getId()?>">
								<?=$menosTemporadas[0]->getNome()?>
							</a>, com <?=$menosTemporadas[0]->getTemporadas()?> temporada
						</div>
					</div>
				</p>
			</div>
		</div>
	</div>
</body>
</html>