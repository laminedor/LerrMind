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
                        <a class="boutton"  data-bs-toggle="modal" data-bs-target="#sessionModal">
                            Demarer Session
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="sessionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Demarrer une session</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body form">
                                    <div class=" ">
                                        <form method="GET" action="{{route('beginSession',$Psycologue->id)}}" >
                                            @csrf
                                            <input type="text" name="titre" id="titre" placeholder="titre session"  autocomplete="off">
                                            <textarea name="description" id="description"  rows="5"></textarea>
                                            

                                            <input type="submit" class="boutton" value="Demarrer">
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>

                </div>
                
            @endforeach

        </div>
        
        
    </section>
@endsection