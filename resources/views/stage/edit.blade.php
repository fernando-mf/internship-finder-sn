@extends('layouts.app')

@section('content')
    <h2 class="main text-center">Modifier offre de stage</h2>
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" method="POST" action="{{ route('stages.update', ['stage', $job->id]) }}">
                <input name="_method" type="hidden" value="PUT">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>Information sur l'entreprise</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        @component('components.control', ['c_name' => '_', 'c_description' => ''])
                            <select id="company_search" class="form-control" autofocus>
                                <option value="">Trouver une entreprise</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        @endcomponent

                        <input type="hidden" id="up" value="{{ old('up') }}" name="up">
                        
                        @component('components.control', ['c_name' => 'company', 'c_description' => 'Nom de l\'entreprise'])
                            <input id="company" type="text" class="form-control" name="company" value="{{ old('company', $job->company->name) }}" required>
                        @endcomponent

                        @component('components.control', ['c_name' => 'website', 'c_description' => 'Site web'])
                            <input id="website" type="url" class="form-control" name="website" value="{{ old('website', $job->company->website) }}" placeholder="https://www.entreprise.com" required>
                        @endcomponent

                        @component('components.control', ['c_name' => 'phone', 'c_description' => 'Téléphone (Facultatif)'])
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $job->company->phone) }}" placeholder="(123) 456-7890" onkeydown="backspacerDOWN(this,event)" onkeyup="backspacerUP(this,event)">
                        @endcomponent

                        @component('components.control', ['c_name' => 'adresse', 'c_description' => 'Adresse (Facultatif)'])
                            <input id="adresse" type="text" class="form-control" name="adresse" value="{{ old('adresse', $job->company->address) }}">
                        @endcomponent

                        @component('components.control', ['c_name' => 'ville', 'c_description' => 'Ville (Facultatif)'])
                            <input id="ville" type="text" class="form-control" name="ville" value="{{ old('ville', $job->company->city) }}">
                        @endcomponent

                        @component('components.control', ['c_name' => 'postal', 'c_description' => 'Code Postal (Facultatif)'])
                            <input id="postal" type="text" class="form-control" name="postal" value="{{ old('postal', $job->company->postal_code) }}">
                        @endcomponent
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>Information sur le poste</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        {{ csrf_field() }}
                        @component('components.control', ['c_name' => 'title', 'c_description' => 'Titre'])
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $job->title) }}" required> 
                        @endcomponent

                        @component('components.control', ['c_name' => 'category', 'c_description' => 'Catégorie'])
                            <select id="category" name="category" class="form-control">
                                @foreach(App\JobCategory::all() as $category)
                                    @if(old('category', $job->category_id) == $category->id)
                                        <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endcomponent
                        <br>
                        @component('components.control_editor', ['c_name' => 'body_editor', 'c_description' => 'Description'])
                            {{--  <textarea rows="5" id="body" class="form-control" name="body" placeholder="Décrivez le stage">{{ old('body') }}</textarea>  --}}
                            <textarea rows="5" id="body_editor" class="form-control" name="body_editor">{!!old('body_editor',$job->description)!!}</textarea>
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
    <br>
    <script>
        var apiBase = "{{route('api.search')}}";
    </script>
@endsection