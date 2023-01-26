@extends('main')
@section('ContenuePage')
        <section class="container chat ">
            <div class="input">
                <textarea name="input" id="input" ></textarea>
                <div id="send" class="boutton" >Send</div>
    
            </div>
            <div id="message" class="message">
       
            </div>
        </section>
        <section class="droiteChatPatient container">
            <div class="">
                <div class="AffichePsycho">
                    <div class="headPsycho">
                        <h3>{{$Psycologue->prenom}} {{$Psycologue->nom}} </h3>
                        <span>{{$Psycologue->specialite_id}}</span>
                    </div>
                    <span class="DescripPsycho">
                        {{$Psycologue->description}}
                    </span>

                </div>

            </div>
            <a  class="boutton" href="{{route('listePsycologue')}}">Liste des Psychologuess</a>
        </section>

    </div>
    

    @php
        $patient = Auth::guard('patient')->user();

    @endphp






    <script>
        var idSession =  "{{$session->id}}";
        var hauteur = $("#message").height();;

        $("#send").click(function(){
            var inputValue = $("#input").val();
            let sms=document.getElementById('message');
            
            var dataSend = {
                _token: "{{ csrf_token() }}",
                message: inputValue,      
                idSession: idSession,
            };

            $.ajax({
                url: "{{ route('sendSms') }}",
                type: "POST",
                data: dataSend,
                success: function(response) {
                    let items = document.createElement('span');
                    items.innerText=inputValue;
                    items.classList.add("droite");
                    sms.appendChild(items);
                    hauteur = hauteur + 2*$(items).height() ;
                    $(sms).scrollTop(hauteur);
                    $('#input').val(null);
                    
                    
                }
            });
        });


        function displayMessages() {
            let sms=document.getElementById('message');
            var dataReceive = {               
                idSession: idSession,
            };
            $.ajax({
                url: "{{ route('recupSms') }}",
                type: 'GET',
                data: dataReceive,
                success: function(response) {
                    for(i=0 ; i<response.length ; i++){
                        let items = document.createElement('span');
                        items.innerText=response[i].content;
                        sms.appendChild(items);
                        hauteur = hauteur + 2*$(items).height();
                        $(sms).scrollTop(hauteur);
                    } 
                }
            });
        }

        setInterval(displayMessages, 500);
    </script>
@endsection