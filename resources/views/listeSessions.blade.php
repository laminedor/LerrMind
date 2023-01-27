@extends('main')
@section('ContenuePage')
@php
    
@endphp
    <section class="list container">
        <h1 class="titre">Liste des <span>Psychologues</span> </h1>
        <div class="listPsycologue row">

            @foreach ($listePsycologues as $Psycologue)
                <div class="col-lg-4 col-md-6 col-12 p-2">
                    <div class="AffichePsycho">
                        <div class="headPsycho">
                            <h3>{{$Psycologue->prenom}} {{$Psycologue->nom}} </h3>
                            <span>{{$Psycologue->specialite_id}}</span>
                        </div>
                        <span class="DescripPsycho">
                            {{$Psycologue->description}}
                        </span>
                        <a class="boutton" href="{{route('beginSession',$Psycologue->id)}}">
                            Demarer Session
                        </a>

                    </div>

                </div>
                
            @endforeach

        </div>
        
        
    </section>
@endsection