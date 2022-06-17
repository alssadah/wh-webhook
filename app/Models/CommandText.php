<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandText extends Model
{
    // Hi Alaa
    use HasFactory;
    protected $fillable = ['command_id','content','lang','status'];
    public function Command()
    {

        return $this->belongsTo(Command::class,'command_id','command_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
