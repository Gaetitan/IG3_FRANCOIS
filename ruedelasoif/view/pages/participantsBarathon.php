<form id="participantsBarathon" class="formulaire" action="index.php?page=participantsBarathon" method="post">
		<h3>Sélectionner un barathon</h3>
		<p>Barathon : 
			<select name="barathon" required>
				<?php foreach ($barathons as $barathon){ ?>
					<option value="<?php echo($barathon->getNumero()) ?>"><?php echo(htmlspecialchars($barathon->getNom())); ?></option>
				<?php } ?>
			</select>
		</p>
		<input class="btn btn-primary" type="submit" value="Valider"/>
	</form>

<?php
	if($recupere){
		if(empty($participants)){
			echo("Aucun participant pour ce barathon.");
		}
		else{
	?>
			<table class="table">
				<tr>
					<th><?php echo(htmlspecialchars($monBarathon->getNom())); ?></th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Prenom</td>
					<td>Nom</td>
				</tr>
				<?php
				$i=1;
				foreach($participants as $participant){ 
				?>
					<tr>
						<td><?php echo($i); ?></td>
						<td><?php echo(htmlspecialchars($participant->getPrenom())); ?></td>
						<td><?php echo(htmlspecialchars($participant->getNom())); ?></td>
					</tr>
				<?php
				$i=$i+1;
				}
		}
		?>
			</table>
	<?php
	}
?>