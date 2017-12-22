@extends('layouts.app') 

@section('content')
    {{--  <div class="jumbotron text-center">
        <div class="container">
            <h1>Liste des milieux de stages</h1>
            <p class="lead">
                Une application faite par les étudiants pour les étudiants
            </p>
        </div>
    </div>  --}}
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Trouvez votre stage dès maintenant</h1>
                <hr>
                <p class="lead"><strong><em>Une application faite par des étudiants pour des étudiants!</em></strong></p>
                @visitor
                    <a href="{{route('login')}}" class="btn btn-primary btn-xl page-scroll">Commencer</a>
                @endvisitor
            </div>
        </div>
    </header>
@endsection