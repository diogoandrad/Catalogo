<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalogo Telefônico</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="{{URL::asset('laravel.jpg')}}">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    @if (session('messageSuccess'))
    <div style="text-align: center;" class="alert alert-success alert-dismissible">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('messageSuccess') }}
    </div>
    @endif

    @if (session('messageUpdate'))
    <div style="text-align: center;" class="alert alert-warning alert-dismissible">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('messageUpdate') }}
    </div>
    @endif

    @if (session('messageDelete'))
    <div style="text-align: center;" class="alert alert-danger alert-dismissible">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('messageDelete') }}
    </div>
    @endif

    <h2>Contatos</h2>

    <form action="{{route('contato.searchContato')}}" method="POST" style="margin-left: 40px; margin-block-end: 20px;">
        {{ csrf_field() }}
        <div class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="nome" style="min-width: 260px;" placeholder="Nome">&nbsp;
                <input type="text" class="form-control" name="telefone" style="min-width: 260px;" placeholder="(00) 00000-0000" id="telefone">&nbsp;
                <input type="email" class="form-control" name="email" style="min-width: 260px;" placeholder="exemplo@gmail.com">&nbsp;
                <button type="submit" class="btn btn-primary">Pesquisar</button>&nbsp;
                <a href="{{url('/criar')}}" class="btn btn-primary" style="margin-left: 400px;">Cadastrar</a>
            </div>
        </div>
    </form>

    <table style="text-align: center;" class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th></th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contatos as $contato)
            <tr>
                <td>{{$contato->nome}}</td>
                <td>{{$contato->telefone}}</td>
                <td>{{$contato->email}}</td>
                <td><a href="{{route('contato.show', $contato->id)}}">Mais Informações</a></td>
                <td><a style="display: inline-block; margin-right: 1px;" href="{{route('contato.edit', $contato->id)}}" class="btn btn-warning"><i class="fa fa-edit" style="font-size:24px"></i></a>
                    <!-- MODAL DELETE -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo-{{$contato->id}}"><i class="fa fa-trash" style="font-size:24px"></i></button>
                    <div class="modal fade" id="modalExemplo-{{$contato->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Deletar Contato!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">Tem certeza que deseja deletá-lo?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <form action="{{route('contato.destroy', $contato->id)}}" method="POST">{{ method_field('DELETE') }}{{ csrf_field() }}<button type="submit" class="btn btn-danger">Deletar</button></form>
                                </div>
                            </div>
                        </div>
                    </div></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-left: 20px;">
        {{ $contatos ?? ''->links() }}
    </div>

    <!-- JAVASCRIPT -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>