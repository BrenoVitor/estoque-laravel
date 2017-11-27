@extends('template/adminlte')
<div class="clear"></div>
@section('conteudo')
<div class="clear"></div>

<!-- Content Header (Page header) -->
<section class="content-header">

    <h1>
        Listagem de Produto
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{action('ProdutoController@lista')}}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Listagem</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listagem de Produtos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(empty($produtos))
                        <div class="alert alert-danger">
                            Você não tem nenhum produto cadastrado.
                        </div>
                        @else

                        @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> 
                            O produto {{ old('nome') }} foi adicionado.
                        </div>
                        @endif

                        <table class="dataTable table table-bordered table-striped table-hover table-responsive">
                            <thead>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Descricao</th>
                            <th>Quantidade</th>
                            <th>Tamanho</th>
                            <th>Categoria</th>
                            <th>Atualizar</th>
                            <th>Remover</th>
                            </thead>
                            @foreach ($produtos as $p)
                            <tr class="{{ $p->quantidade <= 1 ? 'danger' : '' }}">
                                <td>{{$p->nome}}</td>
                                <td>R$ {{$p->valor}}</td>
                                <td>{{$p->descricao}}</td>
                                <td>{{$p->quantidade}}</td>
                                <td>{{$p->tamanho}}</td>
                                <td>{{$p->categoria->nome}}</td>
                                <td>
                                    <a href="/produtos/{{$p->id}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="/produtos/remove/{{$p->id}}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            <tfoot>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Descricao</th>
                            <th>Quantidade</th>
                            <th>Tamanho</th>
                            <th>Categoria</th>
                            <th>Atualizar</th>
                            <th>Remover</th>
                            </tfoot>
                        </table>
                        <h4>
                            <span class="label label-danger pull-right">
                                Um ou menos itens no estoque
                            </span>
                        </h4>
                        @endif
                        <a href='{{action('ProdutoController@formulario')}}' class="btn btn-primary">Novo Produto</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</section>
<div class="clear"></div>
@stop
