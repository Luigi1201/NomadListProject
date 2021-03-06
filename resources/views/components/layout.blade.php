<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>{{ $title ?? 'Città' }}</title>
</head>
<body>
    <div class="container" style="margin-top: 3rem">
        <div class="row" style="border: 2px solid black; height: 17rem">
            {{$immagineSfondo}}
            <div class="col" style="position:absolute; top:0; left:0">
                <h1 style="text-align: center; margin-top: 5rem;"><strong><font color="white"> {{ $nomeCitta }} </font></strong></h1>
            </div>
            <div class="w-100"></div>
            <div class="col" style="position:absolute; top:0; left:0">
                <h3 style="text-align: center; margin-top: 7.5rem;"><strong><font color="white"> {{ $statoCitta }} </font></strong></h3>
            </div>
            <div class="w-100"></div>
            <div class="col" style="position:absolute; top:0; left:0">
                <p style="text-align: center; margin-top: 10rem;"><strong><font color="white"> {{ $numeroLike }}❤️ </font></strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="border: 2px solid black; height:3rem">
                <h5 style="text-align: center; vertical-align: middle; line-height: 3rem ">Informazioni generali</h5>
            </div>
            <div class="col-6" style="border: 2px solid black; height:3rem">
                <h5 style="text-align: center; vertical-align: middle; line-height: 3rem ">Informazioni meteo</h5>
            </div>
        </div>
        <div class="row" style="height:22rem">
            <div class="col"  style="margin-top:2rem">
                {{ $datiGenerali}}
            </div>
            <div class="col" style="margin-top:2rem">
                {{ $datiMeteo }}
            </div>
        </div>
    </div> 
    <div class="container" style="margin-top: 3rem">
        @if ($LikeOrNot=="Aggiungi")
        <h5>{{$LikeOrNot}} {{ $nomeCitta }} alla lista delle tue città preferite</h5>
        @else <h5>{{$LikeOrNot}} {{ $nomeCitta }} dalla lista delle tue città preferite</h5>
        @endif
        <hr>
        <div class="row" style="margin-top:2rem">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{ route('like') }}" method="POST">
                    @csrf
                    <input type="hidden" name="CittaId" value="{{ $cittaId }}">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{$LikeOrNot}}</button>   
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <div class="container" style="margin-top: 3rem">
        <h5>Commenti</h5>
        <hr>
        <div class="row">
            {{ $RecensioniUtenti }}
        </div>
        <div class="row" style="margin-top: 3rem">
            <div class="col-3"></div>
            <div class="col-6">
                <p style="text-align: center">Sei stato in questa città? racconta la tua esperienza!</p>
            </div>
            <div class="col-3"></div> 
        </div>   
        <div class="row">
            <div class="col-3"></div>
                <div class="col-6">
                    <form action="{{ route('recensione') }}" method="POST">
                        @csrf
                        <input type="hidden" name="CittaId" value="{{ $cittaId }}">
                        <input type="text" name="Recensione" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="...">
                        <div style="margin-top:2rem">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Invio</button> 
                    </div>  
                </form>
            </div>
            <div class="col-3"></div> 
        </div>
    </div>
    <div class="container" style="margin-top:3rem; margin-bottom:3rem">
        <hr>
        <div class="row">
            <div class="col">
                <a href="/">Torna all'homepage</a>  
            </div>
        </div>
    </div>
</body>
</html>