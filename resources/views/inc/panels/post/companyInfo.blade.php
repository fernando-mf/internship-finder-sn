<div class="panel panel-default">
	<div class="panel-heading">
		Informations sur la compagnie
	</div>
	<div class="panel-body">
		<div class="row">
			<span class="col-md-12">
				<strong>Nom : </strong>{{$post->company->name}}</span>
		</div>
		<div class="row">
			<span class="col-md-12 col-xs-12">
				<strong>Site web : </strong>
				<a target="blank" href="{{$post->company->website}}">{{$post->company->website}}</a>
			</span>
		</div>
		@if($post->company->phone != null)
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-earphone icon-sp" aria-hidden="true"></span>
                    <a href="tel:{{$post->company->phone}}" target="_top">{{$post->company->phone}}</a>
                </div>
            </div>
        @endif

		<br>
		<div class="row">
			<span class="col-md-12 col-xs-12 text-muted">
				<small>
					<span class="glyphicon glyphicon-plus icon-sp" aria-hidden="true"></span>
					<a href="{{route('companies.show', ['company' => $post->company->id])}}">Plus d'info</a>
				</small>
			</span>
		</div>
	</div>
</div>