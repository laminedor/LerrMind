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

            <span class="sms">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, distinctio fuga. Ad quam at possimus deleniti cumque accusamus praesentium labore odio, placeat dolorum minima recusandae numquam corrupti, fuga quisquam incidunt!
            </span>

            <span class="sms droite">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, distinctio fuga. Ad quam at possimus deleniti cumque accusamus praesentium labore odio, placeat dolorum minima recusandae numquam corrupti, fuga quisquam incidunt!
            </span>

            <span class="sms droite">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, distinctio fuga. Ad quam at possimus deleniti cumque accusamus praesentium labore odio, placeat dolorum minima recusandae numquam corrupti, fuga quisquam incidunt!
            </span>
            
            
        </div>
    </section>

    @php
        $patient = Auth::guard('patient')->user();
        $psycologue = Auth::guard('psycologue')->user();
        if ($patient) {
            $user = 1;
        }else {
            $user = 2;
        }

    @endphp






    <script>
        var connect = "{{$user}}";

        if(connect == 1){
            var envoyeur='patient';
        }    
        else{
            var envoyeur='psycologue';
        }
        var idSession =  "{{$session->id}}";

        $("#send").click(function(){
            var inputValue = $("#input").val();
            let sms=document.getElementById('message');
            
            
            let data = {
                _token: "{{ csrf_token() }}",
                message: inputValue,      
                idSession: idSession,
                envoyeur: envoyeur,
            };

            $.ajax({
                url: "{{ route('sendSms') }}",
                type: "POST",
                data: data,
                success: function(response) {
                    let items = document.createElement('span');
                    items.innerText=inputValue;
                    items.classList.add("droite");
                    sms.appendChild(items);
                    hauteur = $(sms).height();
                    $(sms).scrollTop(hauteur);
                    $('#input').val(null);
                    
                    
                }
            });
        });


        function displayMessages() {
            let sms=document.getElementById('message');
            let data = {
                _token: "{{ csrf_token() }}",                
                idSession: idSession,
            };
            $.ajax({
                url: "{{ route('recupSms') }}",
                type: "get",
                data: data,
                success: function(response) {
                    console.log(response.content);
                    for(i=0 ; i<response.length ; i++){
                        let items = document.createElement('span');
                        items.innerText=response[i].content;
                        sms.appendChild(items);
                        hauteur = $(sms).height();
                        $(sms).scrollTop(hauteur);
                    } 
                }
            });
        }

        //setInterval(displayMessages, 500);
    </script>
@endsection