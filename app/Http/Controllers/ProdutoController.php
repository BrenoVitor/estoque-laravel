<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use Validator;
use estoque\Http\Requests\ProdutosRequest;
use estoque\Categoria;

class ProdutoController extends Controller {
    
    
    public function __construct (){
        $this->middleware('auth');
    }

    public function lista() {
        try {
            $produtos = Produto::all();
            return view('produtos/listagem')->with('produtos', $produtos);
        } catch (Exception $e) {
            flash($e->getMessage())->danger();
            return redirect()->action('ProdutoController@lista');
        }
    }

    public function mostra($id) {
        try {
            $p = Produto::find($id);
            return view('produtos/detalhes')->with('p', $p)->with('categorias',Categoria::All());
        } catch (Exception $e) {
            flash($e->getMessage())->danger();
            return redirect()->action('ProdutoController@lista');
        }
    }

    public function formulario() {
        try {
            return view('produtos/formulario')->with('categorias',Categoria::All());
        } catch (Exception $e) {
            flash($e->getMessage())->danger();
            return redirect()->action('ProdutoController@lista');
        }
    }

    public function novo(ProdutosRequest $request) {
        try {
            //$input = Request::all();
            $input = $request->all();
            if (isset($input)) {
                unset($input['_token']);
                //$validator = Validator::make(
                //[
                //'nome' => Request::input('nome'),
                //'descricao' => Request::input('descricao'),
                //'valor' => Request::input('valor'),
                //'quantidade' => Request::input('quantidade')
                //],
                //[
                //'nome' => 'required|min:5',
                //'descricao' => 'required|max:255',
                //'valor' => 'required|numeric',
                //'quantidade' => 'required|numeric'
                //]
                //);

                //if ($validator->fails()) {
                  //  return redirect()->action("ProdutoControlller@novo");
                //}
                
                
                                
                //$id = DB::table('produtos')->insertGetId($input);
                //$produto = new Produto($input);
                //$id = $produto->save();
                $id = Produto::create($input);
                if ($id) {
                    flash('Produto cadastrado com sucesso!')->success();
                    return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
                } else {
                    flash('Erro ao cadastrar o produto!')->danger();
                    return redirect()->action('ProdutoController@lista');
                }
            } else {
                flash('Erro ao cadastrar o produto!')->danger();
                return redirect()->action('ProdutoController@lista');
            }
        } catch (Exception $e) {
            flash($e->getMessage())->danger();
            return redirect()->action('ProdutoController@lista');
        }
    }

    public function atualiza() {
        try {
            $input = Request::all();
            if (isset($input)) {
                $input['valor'] = str_replace(',', '.', $input['valor']);
                //$p = DB::table('produtos')
                //       ->where('id', $input['id'])
                //       ->update($input);
                $p = Produto::find($input['id']);
                $p->update($input);
                $p->save();

                if ($p) {
                    flash('Produtos atualizado com sucesso!')->success();
                    return redirect()->action('ProdutoController@lista');
                } else {
                    flash('Erro ao atualizar o produto!')->danger();
                    return redirect()->action('ProdutoController@lista');
                }
            } else {
                flash('Erro ao atualizar o produto!')->danger();
                return redirect()->action('ProdutoController@lista');
            }
        } catch (Exception $e) {
            flash($e->getMessage())->danger();
            return redirect()->action('ProdutoController@lista');
        }
    }

    public function remove($id) {
        try {
            if (isset($id) && !empty($id) && $id > 0) {
                //$p = DB::table("produtos")->where('id', $id)->delete();

                $p = Produto::find($id);
                $p->delete();
                if ($p) {
                    flash('Produtos removido com sucesso!')->success();
                    return redirect()->action('ProdutoController@lista');
                } else {
                    flash('Erro ao remover o produto!')->danger();
                    return redirect()->action('ProdutoController@lista');
                }
            } else {
                flash('Erro ao remover o produto!')->danger();
                return redirect()->action('ProdutoController@lista');
            }
        } catch (Exception $e) {
            flash($e->getMessage())->danger();
            return redirect()->action('ProdutoController@lista');
        }
    }

    public function listaJson() {
        try {
            $produtos = Produto::all();
            return response()->json($produtos);
//return response()
//->download($caminhoParaUmArquivo);
        } catch (Exception $e) {
            flash($e->getMessage())->danger();
            return redirect()->action('ProdutoController@lista');
        }
    }

}
