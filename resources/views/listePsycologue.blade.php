@extends('main')
@section('ContenuePage')
@php
    $patient = Auth::guard('patient')->user();
@endphp
    <section class="list container">
        <h1 class="titre">Liste des <span>Psychologues</span> </h1>
        <div class="listPsycologue row">

            @foreach ($listePsycologues as $Psycologue)
                <div class="col-lg-4 col-md-6 col-12 p-2">
                    <div class="AffichePsycho">
                        <div class="headPsycho">
                            <h4>{{$Psycologue->prenom}} {{$Psycologue->nom}} </h4>
                            <span>{{$Psycologue->specialite_id}}</span>
                        </div>
                        <span class="DescripPsycho">
                            {{$Psycologue->description}} 
                        </span>
                        @if ($patient != null)
                            @php
                                $i=0;
                            @endphp
                            @foreach ($sessions as $session)
                                
                                @if ($session->psychologiste_id == $Psycologue->id)
                                    <a class="boutton"  href="{{route('continuerSession',$session->id)}}">
                                        Continuer Session
                                    </a>
                                    @php
                                        $i=1;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($i == 0)
                                <a class="boutton"  data-bs-toggle="modal" data-bs-target="#sessionModal{{$Psycologue->id}}">
                                    Demarer Session
                                </a>
                            @endif
                        @endif
                            
                            
                        <!-- Modal -->
                        <div class="modal fade" id="sessionModal{{$Psycologue->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Demarrer une session</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body form">
                                    <div class=" ">
                                        <form method="POST" action="{{route('beginSession')}}" id="form{{$Psycologue->id}}" >
                                            @csrf
                                            <input type="number" name="id" value="{{$Psycologue->id}}" hidden>
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