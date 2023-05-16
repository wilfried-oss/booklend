<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LendBack extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lend_copy()
    {
        return $this->belongsTo(LendCopy::class);
    }
}
