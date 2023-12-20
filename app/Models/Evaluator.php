<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    use HasFactory;
    protected $table = 'evaluators';
    public $timestamps = false;

    // public function preferences()
    // {
    //     return $this->belongsToMany(EvaluatorPreference::class, 'evaluator_id');
    // }

}
