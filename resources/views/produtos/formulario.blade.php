@extends('template/adminlte')
@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Detalhes/Atualizar do Produto
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detalhes do Produto</li>
    </ol>
</section>


@if($errors->all())
<div class="container-fluid">
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo Produto</h3>
                    </div>
                    <form class="form-horizontal" action="novo" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-10">
                                    <input type="text" name="nome" class="form-control" id="nome" value="{{old('nome')}}" placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valor" class="col-sm-2 control-label">Valor</label>

                                <div class="col-sm-10">
                                    <input type="text" name="valor" class="form-control" id="valor" value="{{old('valor')}}" placeholder="Valor">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="quantidade" class="col-sm-2 control-label">Quantidade</label>

                                <div class="col-sm-10">
                                    <input type="number" min="0" max="100" step="1" name="quantidade" class="form-control" id="quantidade" value="{{old('quantidade')}}" placeholder="Quantidade">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descricao" class="col-sm-2 control-label">Descrição</label>

                                <div class="col-sm-10">
                                    <textarea name="descricao" id="descricao" class="form-control" placeholder="descricao">{{old('descricao')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tamanho" class="col-sm-2 control-label">Tamanho</label>

                                <div class="col-sm-10">
                                    <input type="text" name="tamanho" class="form-control" id="tamanho" value="{{old('tamanho')}}" placeholder="tamanho">
                                </div>
                            </div>

			   <div class="form-group">
    				<label for="categoria_id" class="col-sm-2 control-label">Categoria</label>
				<div class="col-sm-10">
    					<select name="categoria_id" id="categoria_id"  class="form-control">
        				@foreach($categorias as $c)
        				<option value="{{$c->id}}">{{$c->nome}}</option>
        				@endforeach
    					</select>
				</div>
			</div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Novo</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
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

