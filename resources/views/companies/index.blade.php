@extends('layouts.app')

@section('content')
    <h2 class="">Liste des milieux de stages</h2>
    <br>

    @if(count($companies) > 0)
        <div class="list-group"> 
            @foreach($companies as $company)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                <span class="glyphicon glyphicon-menu-right icon-sp" aria-hidden="true"></span>
                                <a href="{{route('companies.show', ['company' => $company->id ])}}">{{$company->name}}</a>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <span class="col-md-12">
                            <strong>Site web : </strong>
                            <a target="blank" href="{{$company->website}}">{{$company->website}}</a>
                        </span>
                    </div>
                </div>
            @endforeach 
        </div>
        <div class="text-center">
            {{$companies->links()}}
        </div> 
    @else
        <p>Aucun résultat trouvé.</p>
    @endif 
@endsection