	<form id="form_barathon" class="formulaire" action="index.php?page=creerBarathon" method="post">
		<h3>Nouveau barathon</h3>
		<p>Nom : <input type="text" name="nom_barathon" placeholder="Stannis Barathon" required /></p>
		<p>Ville : 
			<select name="ville_barathon" onChange="choix(this.form)" required>
				<?php foreach ($bar_villes as $bar_ville){ ?>
					<option><?php print($bar_ville->getVille()); ?></option>
				<?php } ?>
			</select>
		</p>
		<p>Nombre de places : <input type="number" min="0" max="999" name="nbPlaces_barathon" required /></p>
		<p>Date : <input type="datetime-local" name="date_barathon" required/></p>
		<p>Prix : <input type="text" maxlength="6" name="prix_barathon" placeholder="15.50" title="Utiliser un point en guise de virgule." required/> €</p>
		
		<input class="btn btn-primary" type="submit" value="Valider"/>
	</form>
	
	<script language="javascript">
		function choix(form){
			i=
	</script>