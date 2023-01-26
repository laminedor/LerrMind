@extends('main')
@section('ContenuePage')
    <div class="ConBout">
        <a  class="boutton" href="{{route('listePsycologue')}}">Trouver un Psycologue</a>
    </div>
    <section class="container chat">
        <div class="input">
            <textarea name="input" id="input" ></textarea>
            <div id="send" class="boutton" >Send</div>

        </div>
        <div id="message" class="message">

            
            
            
        </div>
    </section>

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