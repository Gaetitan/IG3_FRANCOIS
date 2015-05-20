<?php
	var_dump($listeParticipants);
	foreach($listeParticipants as $participant){
?>
		<tr>
			<td> <?php echo $participant->getNumero(); ?> </td>
			<td> <?php echo $participant->getNom(); ?> </td>
			<td> <?php echo $participant->getPrenom(); ?> </td>
		</tr><?php
	}
?>