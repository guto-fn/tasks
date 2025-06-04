<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'id',
        'name',
        'description',
        
        # Foreign Key (Chave estrangeira para relacionamento com usuário)
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
