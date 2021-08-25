<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'summary_abstract',
        'author_information',
        'presentation_type',
    ];
}
