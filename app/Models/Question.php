<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'question', 'optionA', 'optionB', 'type_id'];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function getScore($left){
        if ($this->type->canMinus()){
            if ($left){
                return -1;
            } else {
                return 1;
            }
        } else {
            if ($left){
                return 0;
            } else {
                return 1;
            }
        }
    }
}
