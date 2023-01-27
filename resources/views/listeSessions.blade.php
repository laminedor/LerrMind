@extends('main')
@section('ContenuePage')
@php
    
@endphp
    <section class="list container">
        <h1 class="titre">Liste des <span>Sessions</span> </h1>
        <div class="listPsycologue row">

            @foreach ($sessions as $session)
                <div class="col-lg-4 col-md-6 col-12 p-2">
                    <div class="AffichePsycho">
                        <div class="headPsycho">
                            <h4>{{$session->titre}}  </h4>
                            
                        </div>
                        <span class="DescripPsycho">
                            {{$session->description}}
                        </span>
                        <a class="boutton" href="{{route('sessionPsycho',$session->id)}}">
                            Consulter
                        </a>

                    </div>

                </div>
                
            @endforeach

        </div>
        
        
    </section>
@endsection