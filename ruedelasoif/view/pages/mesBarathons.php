<table class="table">
	<tr>
		<th>Mes barathons</th>
	</tr>
	<tr>
		<td>Nom</td>
		<td>Ville</td>
		<td>Date</td>
	</tr>
	<?php
		foreach($barathons as $barathon){ ?>
			<tr>
				<td><?php echo(htmlspecialchars($barathon->getNom())); ?></td>
				<td><?php echo(htmlspecialchars($barathon->getVille())); ?></td>
				<td><?php echo(htmlspecialchars(getFrenchDate($barathon->getDate()))); ?></td>
				<td>
					<form action="index.php?page=descriptionBarathon" method="post">
						<input type="hidden" name="num_barathon" value="<?php echo($barathon->getNumero()); ?>"/>
						<input class="btn btn-default" type="submit" value="Infos"/>
					</form>
				</td>
			</tr>
	<?php
		}
	?>
</table>