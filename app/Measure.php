<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $guarded = [];

    public function scopeLatestUserMeasure($query, $userHash)
    {
        return $query->where('user_hash', $userHash)
            ->latest()
            ->first();
    }

    public function scopeRemainingUserMeasures($query, $userHash)
    {
        return $query->where('user_hash', $userHash)
            ->orderBy('created_at', 'desc')
            ->skip('1')
            ->take('1000')
            ->get();
    }
}
