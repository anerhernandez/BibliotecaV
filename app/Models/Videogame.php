<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videogame extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'titulo',
        'descripcion',
        'caratula'
    ]; 

    /**
     * Get the user that owns the Videogame
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
