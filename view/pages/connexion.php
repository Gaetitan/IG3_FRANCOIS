<div class="formulaire" ng-controller="FormController as form">
	<a ng-click="form.setForm(1)" href="" class="btn btn-default">Participant</a>
	<a ng-click="form.setForm(2)" href="" class="btn btn-default">Organisateur</a>

	<form ng-show="form.isSet(1)" id="form_participant" action="index.php?page=connexion" method="post">
		<p>Email : <input type="email" name="email_part" placeholder="cap.america@marvel.com" required /></p>
		<p>Mot de passe : <input type="password" name="mdp_part" required/></p>
		<input class="btn btn-primary" type="submit" value="Valider"/>
	</form>
	<form ng-show="form.isSet(2)" id="form_participant" action="index.php?page=connexion" method="post">
		<p>Email : <input type="email" name="email_orga" placeholder="avengers@marvel.com" required /></p>
		<p>Mot de passe : <input type="password" name="mdp_orga" required /></p>
		<input class="btn btn-primary" type="submit" value="Valider"/>
	</form>
</div>