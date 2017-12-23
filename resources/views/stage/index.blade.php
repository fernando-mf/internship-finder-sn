@extends('layouts.app')

@section('content')
    <h2 class="text-center main">
        Offres de stage
    </h2>
    <br>
    @if(count($jobs) > 0)
        <div class="list-group"> 
            @foreach($jobs as $job)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                <span class="glyphicon glyphicon-pushpin icon-sp" aria-hidden="true"></span>
                                <a href="{{route('stages.show', ['stage' => $job->id ])}}">{{$job->title}}</a>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <span class="col-md-12">
                            <strong>Catégorie : </strong>{{$job->category->name}}
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 text-left">
                            <span class="text-muted">Publié par {{$job->company->name}} </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 text-left">
                            <span class="text-muted">Le {{$job->getDateString()}} </span>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
        <div class="text-center">
            {{$jobs->links()}}
        </div> 
    @else
        <p class="main">Aucune offre de stage trouvée.</p>
    @endif 
@endsection