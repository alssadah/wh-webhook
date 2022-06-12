<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandText extends Model
{
    // Hi Alaa
    use HasFactory;

    public function Command()
    {

        return $this->belongsTo(Command::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
