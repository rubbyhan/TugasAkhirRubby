<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function canMinus(): bool
    {
        if (strlen($this->name) == 2)
            return true;
        return false;
    }
}
