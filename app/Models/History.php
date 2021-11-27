<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email'
        'code',
        'scoreIE', 'scoreSN', 'scoreTF', 'scorePJ',
        'scoreR', 'scoreI', 'scoreA', 'scoreS', 'scoreE', 'scoreC',
        'finished'
    ];
}
