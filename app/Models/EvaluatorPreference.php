<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluatorPreference extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public function evaluator()
    // {
    //     return $this->belongsToMany(Evaluator::class, 'evaluator_id');
    // }
}
