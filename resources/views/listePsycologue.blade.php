@extends('main')
@section('ContenuePage')
@php
    
@endphp
    <section class="list container">
        <h1 class="titre">Liste des <span>Psycologues</span> </h1>
        <div class="listPsycologue row">
            <div>
                @foreach ($listePsycologues as $Psycologue)
                    <a href="{{route('beginSession',$Psycologue->id)}}">{{$Psycologue->nom}}</a><br>
                @endforeach
            </div>
        </div>
        
        
    </section>
@endsection