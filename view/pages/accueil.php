    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Salut à toi barathonien</h1>
            <p>Combien de temps cela fait-il que tu n'as pas pratiqué notre beau sport ? Inscris toi vite au barathon le plus proche de chez toi !</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Barathons à venir</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature" ng-repeat="evenement in barathon.evenements">
                <div class="thumbnail">
                    <img ng-src="{{evenement.image}}" alt="">
                    <div class="caption">
                        <h3>{{evenement.nom}}</h3>
                        <p>{{evenement.ville}} - {{evenement.date | date:'dd/MM/yyyy, hh:mm'}}</p>
                        <p>
							<a href="#" class="btn btn-primary">S'inscrire</a>
							<a href="#" class="btn btn-default">Infos</a>
                        </p>
                    </div>
                </div>
            </div>
			
        </div>
        <!-- /.row -->

        <hr>