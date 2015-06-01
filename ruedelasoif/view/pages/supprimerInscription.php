<form id="supprimerInsscription" class="formulaire" action="index.php?page=supprimerInscription" method="post">
		<h3>Supprimer une inscription</h3>
		<p>Barathon : 
			<select name="inscription" required>
				<?php foreach ($barathons as $barathon){ ?>
					<option value="<?php echo($barathon->getNumero()) ?>"><?php echo(htmlspecialchars($barathon->getNom())); ?></option>
				<?php } ?>
			</select>
		</p>
		<input class="btn btn-primary" type="submit" value="Supprimer"/>
	</form>

<?php
	if($supprime){
			echo "L'inscription a été supprimée !";
	}
?>