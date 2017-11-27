<?php namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

    protected $table = 'produtos';
    protected $fillable = array("nome","descricao","valor","quantidade","tamanho","categoria_id");
    protected $garded = array("id");
    public $timestamps = false;
   
    public function categoria(){
    	return $this->belongsTo('estoque\Categoria');
    } 

}
