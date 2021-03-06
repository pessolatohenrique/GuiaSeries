  </head>
  <body>
    <!-- ÁREA DO MENU !-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">GuiaSeries</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Agenda<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="agenda.php">Geral</a></li>
                  <li><a href="agenda.php?listaPorUsuario=1">Minha Agenda</a></li>
                </ul>
            </li>
            </li>
            <li class="dropdown">
           		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Minha Lista<span class="caret"></span></a>
    	          <ul class="dropdown-menu">
    	            <li><a href="lista-filmes.php?listaPorUsuario=1&status=assistido">Filmes</a></li>
    	            <li><a href="lista-series.php?listaPorUsuario=1&status=10">Séries</a></li>
                  <li><a href="estatistica-filmes.php">Estatísticas Filmes</a></li>
    	            <li><a href="estatistica-series.php">Estatísticas Séries</a></li>
    	          </ul>
            </li>
           	<li class="dropdown">
           		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Adicionar Novo<span class="caret"></span></a>
    	          <ul class="dropdown-menu">
                  <li><a href="form-agenda.php">Agenda</a></li>
    	            <li><a href="form-genero.php">Gênero</a></li>
    	            <li><a href="form-filme.php">Filme</a></li>
                  <li><a href="form-serie.php">Série</a></li>
                  <li><a href="form-temporada.php?criterio=s.nome">Temporada</a></li>
    	            <li><a href="form-episodio.php?criterio=s.nome">Episódio</a></li>
    	          </ul>
            </li>
          	<li class="dropdown">
           		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Listar<span class="caret"></span></a>
    	          <ul class="dropdown-menu">
           				<li><a href="lista-filmes.php">Filmes</a></li>
                      <li><a href="lista-series.php">Séries</a></li>
    	          </ul>
            </li>
            	<li class="dropdown">
           		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Pesquisa<span class="caret"></span></a>
    	          <ul class="dropdown-menu">
           				<li><a href="form-filme.php?opcao=pesquisa">Filmes</a></li>
                      <li><a href="form-serie.php?opcao=pesquisa">Séries</a></li>
    	          </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="form-usuario.php?alteracao=1"><span class="glyphicon glyphicon-user"></span>
            		<?php 
            			if($usuarioObj->estaLogado()): 
            				echo "<strong>{$usuarioObj->usuarioLogado()}</strong>";
            			endif;
            		?>
            </a></li>
            <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- FIM DA ÁREA DO MENU !-->