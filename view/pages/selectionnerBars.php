<div class="formulaire" ng-controller="FormController as form">
	<?php foreach($barathons as $barathon){ ?>
		<a ng-click="form.setForm(<?php echo($barathon->getNumero()); ?>)" href="" class="btn btn-default"><?php echo($barathon->getNom()); ?></a>
	
		<form ng-show="form.isSet(<?php echo($barathon->getNumero()); ?>)" id="form_selectionnerBars" action="index.php?page=selectionnerBars" method="post">
			<input type="hidden" name="num_barathon" value="<?php echo($barathon->getNumero()); ?>"/>
			<?php
				foreach($bars as $bar){
					if($bar->getVille()===$barathon->getVille()){
					?>				
						<label>
							<input type="checkbox" name="num_bar_<?php echo($bar->getNumero()); ?>" value="<?php echo($bar->getNumero()); ?>" />
									<?php print($bar->getNom()); ?>
						</label>
					<?php 
					}
				} ?>
			<input class="btn btn-primary" type="submit" value="Valider"/>
		</form>
	<?php } ?>
</div>