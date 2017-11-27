@extends('template/adminlte')
@section('conteudo')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detalhes/Atualizar do Produto
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/produtos"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Detalhes do Produto</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $p->nome }}</h3>
                        </div>

                        <form class="form-horizontal" action="atualiza" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" id="id" value="{{$p->id}}">

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nome" class="col-sm-2 control-label">Nome</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="nome" id="nome" value="{{$p->nome}}" class="form-control"  placeholder="Nome">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="valor" class="col-sm-2 control-label">Valor</label>

                                    <div class="col-sm-10">
                                        <input type="text" id="valor" name="valor" value="{{$p->valor}}" class="form-control"  placeholder="Valor">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="quantidade" class="col-sm-2 control-label">Quantidade</label>

                                    <div class="col-sm-10">
                                        <input type="number" min="0" max="100" step="1" name="quantidade" id="quantidade" value="{{$p->quantidade}}" class="form-control"  placeholder="Quantidade">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição">{{$p->descricao}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="tamanho" class="col-sm-2 control-label">Tamanho</label>

                                    <div class="col-sm-10">
                                        <input type="tamanho" name="tamanho" id="tamanho" value="{{$p->tamanho}}" class="form-control"  placeholder="tamanho">
                                    </div>
                                </div>
                                
                                <div class="form-group">
    				<label for="categoria_id" class="col-sm-2 control-label">Categoria</label>
				<div class="col-sm-10">
    					<select name="categoria_id" id="categoria_id"  class="form-control">
        				@foreach($categorias as $c)
        				<option {{$c->id == $p->categoria->id ? 'selected' : ''}} value="{{$c->id}}">{{$c->nome}}</option>
        				@endforeach
    					</select>
				</div>
			</div>


                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Atualizar</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
