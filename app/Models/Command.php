<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    // Hi Alaa
    use HasFactory;
    protected $primaryKey = 'command_id';
    public function CommandText()
    {
        // App\CoreCommand::find(3)->coreCommandText;
        return $this->hasMany(CommandText::class,'command_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
