{{--
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">

			<!-- Collapsed Hamburger -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Branding Image -->
			<a class="navbar-brand" href="{{ route('index') }}">
				{{ config('app.name', 'TECCART') }}
			</a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				@logged
				<li>
					<a href="{{ route('posts.index') }}">Publications</a>
				</li>
				<li>
					<a href="{{ route('companies.index') }}">Milieux de stages</a>
				</li>
				@endlogged
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@auth('admin') 
					@include('inc.drop.admin') 
				@endauth 
				
				@auth('web') 
					@include('inc.drop.student') 
				@endauth 
			
				@visitor
					<li>
						<a href="{{ route('admin.login') }}">Administration</a>
					</li>
					<li>
						<a href="{{ route('login') }}">Se connecter</a>
					</li>
					<li>
						<a href="{{ route('register') }}">Créer un compte</a>
					</li>
				@endvisitor
			</ul>
		</div>
	</div>
</nav> --}}


<nav id="mainNav" class="navbar navbar-default navbar-{{Request::is('/')? 'fixed':'static'}}-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> Menu
				<i class="fa fa-bars"></i>
			</button>
			
			<a class="navbar-brand" href="{{ route('index') }}">
				Stages Institut Teccart
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@logged
					<li>
						<a href="{{ route('posts.index') }}">Publications</a>
					</li>
					<li>
						<a href="{{ route('companies.index') }}">Milieux de stages</a>
					</li>
					<li>
						<a href="{{ route('stages.index') }}">Offres de stage</a>
					</li>
					@auth('admin')
						<li>
							<a href="{{ route('stages.create') }}">Ajouter offre de stage</a>
						</li>

						@master
							<li>
								<a href="{{ route('admin.create') }}">Ajouter un administrateur</a>
							</li>
						@endmaster

					@endauth
				@endlogged
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@auth('admin') 
					{{--  <li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
																document.getElementById('logout-form').submit();">
							Se déconnecter
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>  --}}
					@include('inc.drop.admin')
				@endauth 
				
				@auth('web') 
					@include('inc.drop.student') 
				@endauth 
			
				@visitor
					<li>
						<a href="{{ route('admin.login') }}">Administration</a>
					</li>
					<li>
						<a href="{{ route('login') }}">Se connecter</a>
					</li>
					<li>
						<a href="{{ route('register') }}">Créer un compte</a>
					</li>
				@endvisitor
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>