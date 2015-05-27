	<form id="form_bar" class="formulaire" action="index.php?page=ajouterBar" method="post">
		<h3>Nouveau bar</h3>
		<p>Nom : <input type="text" name="nom_bar" placeholder="Cubanito Café" required /></p>
		<label>Adresse</label>
		<p>Numéro : <input type="text" name="numadresse_bar" placeholder="13" required /></p>
		<p>Rue : <input type="text" name="rue_bar" placeholder="rue de Verdun" required /></p>
		<p>Code postal : <input type="text" name="codepostal_bar" placeholder="34000" pattern="[0-9]{5}" title="Saisir 5 chiffres." required/></p>
		<p>Ville : <input type="text" name="ville_bar" placeholder="Montpellier" required/></p>
		<input class="btn btn-primary" type="submit" value="Valider"/>
	</form>