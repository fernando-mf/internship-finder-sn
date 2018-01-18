@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Administrateur</h4>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <span class="col-md-12 text-center">
                            <a class="btn btn-default" href="{{ route('admin.reset-password') }}">Modifier mot de passe</a>
                        </span>
                    </div>
                    <br>
                    <div class="row">
                            <span class="col-md-12 text-center">
                                <a class="btn btn-default" href="{{route('stages.create')}}">Ajouter une Offre de Stage</a>
                            </span>
                    </div>
                    <br>
                    <div class="row">
                            <span class="col-md-12 text-center">
                                <a class="btn btn-default" href="{{route('admin.create')}}">Ajouter un Administrateur</a>
                            </span>
                    </div>
                    <br>
                    <div class="row">
                            <span class="col-md-12 text-center">
                                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Se déconnecter
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    </form>
                            </span>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
