<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Modalidade;


class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'local',
        'data',
        'endereco',
        'cartaz',
        'telefone',
        'pix',
        'valor'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modalidades()
    {
        return $this->belongsToMany(Modalidade::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }
}
