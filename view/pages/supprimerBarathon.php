<form id="supprimerBarathon" class="formulaire" action="index.php?page=supprimerBarathon" method="post">
		<h3>Supprimer un barathon</h3>
		<p>Barathon : 
			<select name="barathon" required>
				<?php foreach ($barathons as $barathon){ ?>
					<option value="<?php echo($barathon->getNumero()) ?>"><?php echo($barathon->getNom()); ?></option>
				<?php } ?>
			</select>
		</p>
		<input class="btn btn-primary" type="submit" value="Supprimer"/>
	</form>

<?php
	if($supprime){
			echo "Le barathon a été supprimé !";
	}
?>