    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
		<?php if(empty($_COOKIE['idPart'])&&empty($_COOKIE['idOrga'])){ ?>
            <h1>Salut le barathonien !</h1>
            <p>Inscrivez vous vite au barathon le plus proche de chez vous !</p>
        <?php
		}
		if(!empty($_COOKIE['idPart'])&&empty($_COOKIE['idOrga'])){ ?>
			<h1>Bonjour <?php echo($participant->getPrenom()) ?> !</h1>
            <p>Quel nouveau barathon allez-vous rejoindre aujourd'hui ?</p>
		<?php
		}
		if(empty($_COOKIE['idPart'])&&!empty($_COOKIE['idOrga'])){
		?>
		<h1>Bonjour <?php echo($organisateur->getNom()) ?> !</h1>
            <p>Quel nouvel événement de folie nous préparez-vous ?</p>
		<?php
		}
		?>
		</header>
		
        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Barathons à venir</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
			<?php foreach($barathons as $barathon){ ?>
				<div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail">
						<div class="caption">
							<h3><?php echo($barathon->getNom()); ?></h3>
							<p><?php echo($barathon->getVille()); ?></p>
							<p><?php echo(getFrenchDate($barathon->getDate())); ?></p>
							<p>
								<?php if(empty($_COOKIE['idOrga'])){ ?>
									<form action="index.php?page=inscriptionBarathon" method="post">
										<input type="hidden" name="num_barathon" value="<?php echo($barathon->getNumero()); ?>"/>
										<input class="btn btn-primary" type="submit" value="S'inscrire"/>
									</form>
								<?php } ?>
								<form action="index.php?page=descriptionBarathon" method="post">
									<input type="hidden" name="num_barathon" value="<?php echo($barathon->getNumero()); ?>"/>
									<input class="btn btn-default" type="submit" value="Infos"/>
								</form>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			
        </div>
        <!-- /.row -->