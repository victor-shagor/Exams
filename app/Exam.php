<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
  protected $fillable = ['question'];
    protected $casts = [
        'answers' => 'array',
      ];
}
