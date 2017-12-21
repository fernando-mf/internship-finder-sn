@if(count($company->inside_contacts) > 0)
    <div class="row">
        <span class="col-md-12 col-xs-12">
            <h4 style="text-decoration: underline;">
                <strong>Contacts et personnes ressources dans l'entreprise</strong>
            </h4>
        </span>
    </div>

    <div class="row">
        @foreach($company->inside_contacts as $contact)
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>{{$contact->name}}</strong>
                    </div>
                    <div class="panel-body">

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
                                    <span>
                                        <strong>Ext/Poste</strong>
                                    </span>
                                    <span class="icon-sp m">{{$contact->ext_poste}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif