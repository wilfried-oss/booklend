<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LendCopy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lend()
    {
        return $this->belongsTo(Lend::class);
    }

    public function lend_copies()
    {
        return $this->belongsTo(Number::class);
    }

    public function lend_back()
    {
        return $this->hasOne(LendBack::class);
    }
}
