<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href={{ URL::to('/')}}>{{ trans('site_cst.site_name') }}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href={{ URL::to('/')}}>Accueil</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Plannings <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href={{ URL::to('/calendrier') }}>Associations</a></li>
                        <li><a href="http://ismin.emse.fr/ismin/AffichePlanningMois.php?cycle=ismea&annee=1A">1A</a></li>
                        <li><a href="http://ismin.emse.fr/ismin/AffichePlanningMois.php?cycle=ismea&annee=2A">2A</a></li>
                        <li><a href="http://ismin.emse.fr/ismin/AffichePlanningMois.php?cycle=ismea&annee=3A">3A</a></li>
                        <li><a href="http://ismin.emse.fr/ismin/AffichePlanningMois.php?cycle=ismea&annee=3A&option=M_S">3A M&S</a></li>
                        <li><a href="http://ismin.emse.fr/ismin/AffichePlanningMois.php?cycle=ismea&annee=3A&option=ITS">3A ITS</a></li>
                    </ul>
                </li>
                <li>
                    <a href={{ URL::to('/formation') }}>La formation</a>
                </li>
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Visite guidée <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="visite-ecole/">L'école</a></li>
                        <li><a href="visite-rez/">La réz'</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="covoiturage/">Covoiturage</a></li>
                        <li><a href="courses/">Livraison de courses</a></li>
                    </ul>
                    </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Associations <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    	@foreach($assos as $asso)
                    		<li><a href= {{URL::to('/article/'.$asso->name)}}>{{$asso->name}}</a></li>
                    	@endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clubs <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    	@foreach($clubs as $club)
                    		<li><a href = {{URL::to('/article/'.$club->name)}}>{{$club->name}}</a></li>
                    	@endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Liens <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="http://ismin.emse.fr/ismin/">Scolamines</a></li>
                        <li><a href="http://portail.emse.fr/">Portail</a></li>
                        <li><a href="https://cloud-sgc.emse.fr:5001/webman/index.cgi">Cloud</a></li>
                        <li><a href="http://services-numeriques.emse.fr/documentation/assistance">Wiki DSI</a></li>
                        <li class="divider"></li>
                        <li><a href="http://photos-ismin.tumblr.com/">Tumblr</a></li>
                    </ul>
                </li>
<!--                 <li> -->
<!--                     <a href="#">Innov'Action</a> -->
<!--                 </li> -->
				@if( Auth::user())
				<li>
					<a href={{URL::to('/logout') }}>Se déconnecter</a>
				</li>
				@else
                <li>
                    <a href={{URL::to('/login') }}>Se connecter</a>
				</li>
				@endif
            </ul>
        </div>
    </div>
</nav>