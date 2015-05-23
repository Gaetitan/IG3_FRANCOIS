<table>
	<tr>
		<th><?php print($barathon->getNom()) ?></th>
	</tr>
	<tr>
		<td>Ville</td>
		<td><?php print($barathon->getVille()) ?></td>
	</tr>
	<tr>
		<td>Date</td>
		<td><?php print(getFrenchDate($barathon->getDate())) ?></td>
	</tr>
	<tr>
		<td>Nombre de places</td>
		<td><?php print($barathon->getNbPlaces_base()) ?></td>
	</tr>
	<tr>
		<td>Places restantes</td>
		<td><?php print($barathon->getNbPlaces()) ?></td>
	</tr>
	<tr>
		<td>Prix</td>
		<td><?php print($barathon->getVille()) ?></td>
	</tr>
	<tr>
		<td>Ville</td>
		<td><?php print($barathon->getVille()) ?></td>
	</tr>
	<tr>
		<td><a href="#" class="btn btn-primary">S'inscrire</a></td>
	</tr>


</table>