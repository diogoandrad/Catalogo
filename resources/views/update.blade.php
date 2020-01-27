<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Contato</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="{{URL::asset('laravel.jpg')}}">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css">
    <!-- jQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{url('/')}}">Catalogo Telefônico <small>1.0</small></a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- Options -->
            </div>
        </div>
    </nav>

    @if (session('messageValidate'))
    <div style="text-align: center;" class="alert alert-danger alert-dismissible">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('messageValidate') }}
    </div>
    @endif

    <h2>Editar Cadastro</h2>

    <form action="{{route('contato.update', $contato->id)}}" method="POST" enctype="multipart/form-data" id="form">
        {!! method_field('put') !!}
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-8">
                <h6>Dados Pessoais</h6>
                <hr style="width: 125%;">
            </div>

            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{$contato->nome}}" required>
            </div>

            <div class="form-group col-md-2">
                <label for="nascimento">Data de Nascimento</label>
                <input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="dd/mm/aaaa" value="{{$contato->nascimento}}" required>
            </div>

            <div class="form-group col-md-2">
                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo" value="{{$contato->sexo}}" required>
                    <option>Sexo</option>
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="{{$contato->telefone}}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="exemplo@gmail.com" value="{{$contato->email}}" required>
            </div>

            <div class="form-group col-md-8">
                <h6>Endereço</h6>
                <hr style="width: 125%;">
            </div>

            <div class="form-group col-md-6">
                <label for="lagradouro">Lagradouro</label>
                <input type="text" class="form-control" name="lagradouro" placeholder="Rua Maria dos anjos" value="{{$contato->lagradouro}}" required>
            </div>
            
            <div class="form-group col-md-1">
                <label for="numero">Número</label>
                <input type="text" class="form-control" name="numero" placeholder="000" value="{{$contato->numero}}" required>
            </div>

            <div class="form-group col-md-3">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="{{$contato->bairro}}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="{{$contato->cidade}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="estado">Estado</label>
                <select class="form-control" name="estado" value="{{$contato->estado}}" required>
                    <option>Estado</option>
                    <option>Rio de Janeiro</option>
                    <option>São Paulo</option>
                    <option>Paraiba</option>
                    <option>Pernambuco</option>
                    <option>Rio Grande do Norte</option>
                    <option>Ceará</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>  
        <a href="{{url('/')}}" class="btn btn-secondary">Voltar</a>
    </form>

    <!-- JAVASCRIPT -->
    <script type="text/javascript">
        $("#telefone").mask("(00) 00000-0000");
        $("#nascimento").mask("00/00/0000");
    </script>
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
