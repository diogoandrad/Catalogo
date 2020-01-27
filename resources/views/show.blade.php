<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informações do Contato</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="{{URL::asset('laravel.jpg')}}">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css">
</head>
<body>
    <div style="text-align: center; margin-top: 140px; margin-left: 120px">
        <div class="card border-dark mb-3" style="max-width: 80rem;">
            <div class="card-header">Informações do Contato</div>
                <div class="card-body text-dark">
                    <h5 class="card-title">{{ $contato->nome }}</h5>
                    <p class="card-text"><b>Data de Nacimento: </b>{{ $contato->nascimento }} &nbsp; <b>Sexo: </b>{{ $contato->sexo }} <br> 
                        <b>Telefone: </b>{{ $contato->telefone }} &nbsp; <b>E-mail: </b>{{ $contato->email }} <br>
                        <b>Lagradouro: </b>{{ $contato->lagradouro }} &nbsp; <b>Nº: </b> {{ $contato->numero }} &nbsp; <b>Bairro: </b>{{ $contato->bairro }} <br>
                        <b>Cidade: </b>{{ $contato->cidade }} &nbsp; <b>Estado: </b>{{ $contato->estado }} </p>
                </div>
        </div>
    </div>
    <div style="text-align: center;">
        <a href="{{url('/')}}" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>