<table>
  <tr>
    <th><?php echo($barathon->getNom()) ?></th>
  </tr>
  <tr>
    <td>Ville</td>
    <td><?php echo($barathon->getVille()) ?></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><?php echo(getFrenchDate($barathon->getDate())) ?></td>
  </tr>
  <tr>
    <td>Nombre de places</td>
    <td><?php echo($barathon->getNbPlaces_base()) ?></td>
  </tr>
  <tr>
    <td>Places restantes</td>
    <td><?php echo($barathon->getNbPlaces()) ?></td>
  </tr>
  <tr>
    <td>Prix</td>
    <td ><?php echo($barathon->getPrix()) ?> €</td>
  </tr>
  <tr>
    <td>Organisateur</td>
    <td><?php echo($orga->getNom()) ?></td>
  </tr>
  <tr>
    <td>Bars</td>
	<?php
			if(empty($barsConcernes)){ ?>
				<td><?php echo "Aucun bar pour ce barathon pour l'instant."?></td>
			<?php
			}
			else{
				foreach($barsConcernes as $barConcerne){ ?>
					<td><?php echo($barConcerne->getNom()); ?></td>
		<?php }
			}
		?>
  </tr>
  <?php if(empty($_COOKIE['idOrga'])){ ?>
		<tr>
			<td>
				<form action="index.php?page=inscriptionBarathon" method="post">
					<input type="hidden" name="num_barathon" value="<?php echo($barathon->getNumero()); ?>"/>
					<input class="btn btn-primary" type="submit" value="S'inscrire"/>
				</form>
			</td>
		</tr>
	<?php } ?>
</table>