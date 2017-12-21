<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
		{{ Auth::user()->fname }} {{ Auth::user()->lname }}
		<span class="caret"></span>
	</a>

	<ul class="dropdown-menu">
		<li>
			<a href="{{ route('profil') }}">
				Mon Profil
			</a>
		</li>

        <li>
			<a href="{{ route('posts.create') }}">
				Ajouter une éxperience de stage
			</a>
		</li>

		<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
				Se déconnecter
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</li>
	</ul>
</li>