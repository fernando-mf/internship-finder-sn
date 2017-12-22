@extends('layouts.app') 
@section('content') 
    @include('inc.errors')
    <h2 class="text-center main">Ajouter une expérience de stage</h2>
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>Information sur le stage</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        {{ csrf_field() }}
                        @component('components.control', ['c_name' => 'title', 'c_description' => 'Titre'])
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus > 
                        @endcomponent

                        @component('components.control', ['c_name' => 'body', 'c_description' => 'Description'])
                            <textarea rows="5" id="body" class="form-control" name="body" placeholder="Décrivez votre expérience de stage p.ex: Les tâches que vous avez faites, l'environnement de travail, la formation reçue dans la compagnie, etc">{{ old('body') }}</textarea>
                        @endcomponent

                        @component('components.control', ['c_name' => 'program', 'c_description' => 'Programme'])
                            <select name="program" id="program" class="form-control">
                                @foreach(App\Program::all()->where('code', '!=', '0') as $program)
                                    @if(old('program') == $program->id || Auth::user()->program_id == $program->id)
                                        <option selected="selected" value="{{$program->id}}">{{$program->name}} - {{$program->code}}</option>
                                    @else
                                        <option value="{{$program->id}}">{{$program->name}} - {{$program->code}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endcomponent
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>Information sur l'entreprise</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        @component('components.control', ['c_name' => '_', 'c_description' => ''])
                            <select id="company_search" class="form-control">
                                <option value="">Trouver une entreprise</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        @endcomponent

                        <input type="hidden" id="up" value="{{ old('up') }}" name="up">
                        
                        @component('components.control', ['c_name' => 'company', 'c_description' => 'Nom de l\'entreprise'])
                            <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" required>
                        @endcomponent

                        @component('components.control', ['c_name' => 'website', 'c_description' => 'Site web'])
                            <input id="website" type="url" class="form-control" name="website" value="{{ old('website') }}" placeholder="https://www.entreprise.com" required>
                        @endcomponent

                        @component('components.control', ['c_name' => 'phone', 'c_description' => 'Téléphone (Facultatif)'])
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="(123) 456-7890" onkeydown="backspacerDOWN(this,event)" onkeyup="backspacerUP(this,event)">
                        @endcomponent
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>Contact, personne resource ou superviseur de stage (Facultatif)</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        @component('components.control', ['c_name' => 'co_name', 'c_description' => 'Nom'])
                            <input id="co_name" type="text" class="form-control" name="co_name" value="{{ old('co_name') }}">
                        @endcomponent

                        @component('components.control', ['c_name' => 'co_email', 'c_description' => 'Adresse courriel'])
                            <input id="co_email" type="email" class="form-control" name="co_email" value="{{ old('co_email') }}">
                        @endcomponent

                        @component('components.control', ['c_name' => 'co_phone', 'c_description' => 'Téléphone'])
                            <input id="co_phone" type="text" class="form-control" name="co_phone" value="{{ old('co_phone') }}" placeholder="(123) 456-7890" onkeydown="backspacerDOWN(this,event)" onkeyup="backspacerUP(this,event)">
                        @endcomponent

                        @component('components.control', ['c_name' => 'co_ext', 'c_description' => 'Poste / Ext'])
                            <input id="co_ext" type="text" class="form-control" name="co_ext" value="{{ old('co_ext') }}">
                        @endcomponent
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            Ajouter
                        </button>
                    </div>
                </div>
            </form>
         </div>
    </div>
    <script>
        var apiBase = "{{route('api.search')}}";
    </script>
@endsection