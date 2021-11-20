<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debito extends Model {

		public $timestamps = false;
		protected $primaryKey = 'cdDebito';
		protected $fillable = ['tipo', 'valor', 'descricao', 'cdCarro'];

		public function carro()
		{
			return $this->belongsTo(Carro::class);
		}

	}

?>