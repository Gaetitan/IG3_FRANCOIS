    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
		
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?page=0">RUE DE LA SOIF</a>
            </div>
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div ng-controller="TabController as tab" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a ng-click="tab.setTab(1)" href>Créer un compte</a>
                    </li>
                    <li>
                        <a ng-click="tab.setTab(2)" href>Se connecter</a>
                    </li>
					<li>
                        <a ng-click="open()" href>Se connecter</a>
                    </li>
                </ul>
				
				<!-- Navbar forms -->
				<!-- Inscription form beginning -->
				<div ng-controller="FormController as form" ng-show="tab.isSet(1)" >
					<a ng-click="form.setForm(1)" class="btn btn-default">Participant</a>
					<a ng-click="form.setForm(2)" class="btn btn-default">Organisateur</a>
					
					<form ng-show="form.isSet(1)" ng-submit="participantForm.$valid && form.addParticipant()" ng-show="form.isSet(1)" name="participantForm" novalidate>
						<div ng-show="form.isSet(1)" name="participant">
							<label for="partnom">Nom :</label>
							<input ng-model="form.partnom" type="text" id="partnom" required placeholder="Rogers"/><br>
							<label for="partprenom">Prénom :</label>
							<input ng-model="form.partprenom" type="text" id="partprenom" required placeholder="Steve"/><br>
							<label for="partemail">Email :</label>
							<input ng-model="form.partemail" type="email" id="partemail" required placeholder="steverogers@marvel.fr"/><br>
							<label for="partmdp">Mot de passe :</label>
							<input ng-model="form.partmdp" type="password" id="partmdp" required/><br>
							<div>Form is {{participantForm.$valid}}</div>
							<input class="btn btn-default" type="submit" value="Valider"/>
						</div>
					</form>
					
					<form ng-show="form.isSet(2)" ng-submit="organisateurForm.$valid && form.addOrganisateur()" name="organisateurForm" novalidate>
						<label for="organom">Nom :</label>
						<input ng-model="form.organom" type="text" id="organom" required placeholder="The Avengers"/><br>
						<label for="orgaemail">Email :</label>
						<input ng-model="form.orgaemail" type="email" id="orgaemail" required placeholder="theavengers@marvel.fr"/><br>
						<label for="orgamdp">Mot de passe :</label>
						<input ng-model="form.orgamdp" type="password" id="orgamdp" required /><br>
						<div>Form is {{organisateurForm.$valid}}</div>
						<input class="btn btn-default" type="submit" value="Valider"/>
					</form>
				</div>
				<!-- Inscription form end -->
				<!-- Connection form beginning -->
			
				<!-- Connection form end -->
				
				
				
            </div>
            <!-- /.navbar-collapse -->		
			
        </div>
        <!-- /.container -->
    </nav>