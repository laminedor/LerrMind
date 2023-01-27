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
                        <!--
                        <div class="headPsycho">
                            <h3> </h3>
                            <span></span>
                        </div>
                        <span class="DescripPsycho">
                            
                        </span>
                         -->
                        <a class="boutton" href="{{route('sessionPsycho',$session->id)}}">
                            session
                        </a>

                    </div>

                </div>
                
            @endforeach

        </div>
        
        
    </section>
@endsection