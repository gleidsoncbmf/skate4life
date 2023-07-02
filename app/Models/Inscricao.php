<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'apelido',
        'email',
        'telefone',
        'instagram',
        'pagamento',
        'modalidade_id',
        'categoria_id',
        'campeonato_id',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    
}
