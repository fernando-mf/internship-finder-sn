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
</nav>