@if(count($post->inside_contacts) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Contact, personne ressource ou superviseur de stage
        </div>
        <div class="panel-body">
            @foreach($post->inside_contacts as $contact)
                <div class="row">
                    <span class="col-md-12">
                        <strong>{{$contact->name}}</strong>
                    </span>
                </div>
                @if($contact->email)
                    <div class="row">
                        <div class="col-md-12 col-md-offset-1 col-xs-offset-1">
                            <span class="glyphicon glyphicon-envelope icon-sp" aria-hidden="true"></span>
                            <a href="mailto:{{$contact->email}}" target="_top">{{$contact->email}}</a>
                        </div>
                    </div>
                @endif
                @if($contact->phone != null)
                    <div class="row">
                        <div class="col-md-12 col-md-offset-1 col-xs-offset-1">
                            <span class="glyphicon glyphicon-earphone icon-sp" aria-hidden="true"></span>
                            <a href="tel:{{$contact->phone}}" target="_top">{{$contact->phone}}</a>
                        </div>
                    </div>
                @endif
                @if($contact->ext_poste != null)
                    <div class="row">
                        <div class="col-md-12 col-md-offset-1 col-xs-offset-1">
                            <span><strong>Ext/Poste</strong></span>
                            <span class="icon-sp m">{{$contact->ext_poste}}</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif