    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Salut à toi barathonien</h1>
            <p>Combien de temps cela fait-il que tu n'as pas pratiqué notre beau sport ? Inscris toi vite au barathon le plus proche de chez toi !</p>
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