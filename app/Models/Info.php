<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Info extends Model
{
    /** @use HasFactory<\Database\Factories\InfoFactory> */
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function item(): MorphOne
    {
        return $this->morphOne(Item::class, 'content');
    }
}
