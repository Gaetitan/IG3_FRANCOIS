    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
		
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?page=accueil">RUE DE LA SOIF</a>
            </div>
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<?php
						if(empty($_COOKIE['idPart']) && empty($_COOKIE['idOrga'])){
					?>
						<li>
							<a href="index.php?page=creerCompte">Créer un compte</a>
						</li>
						<li>
							<a href="index.php?page=connexion">Se connecter</a>
						</li>
					<?php
					}
					if(!empty($_COOKIE['idPart']) && empty($_COOKIE['idOrga'])){ ?>
						<li>
							<a href="index.php?page=mesBarathons">Mes barathons</a>
						</li>
						<li>
							<a href="">Supprimer une inscription</a>
						</li>
						<li>
							<a href="index.php?page=deconnexion">Déconnexion</a>
						</li>
					<?php
					}
					if(empty($_COOKIE['idPart']) && !empty($_COOKIE['idOrga'])){ ?>
						<li>
							<a href="index.php?page=creerBarathon">Créer un barathon</a>
						</li>
						<li>
							<a href="index.php?page=selectionnerBars">Sélectionner des bars</a>
						</li>
						<li>
							<a href="index.php?page=ajouterBar">Ajouter un bar</a>
						</li>
						<li>
							<a href="index.php?page=mesBarathons">Mes barathons</a>
						</li>
						<li>
							<a href="index.php?page=deconnexion">Déconnexion</a>
						</li>
					<?php
					}
					?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->		
			
        </div>
        <!-- /.container -->
    </nav>