<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModels extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    public $table = 'subject';

    /**
     * @var bool
     */
    public $timestamps = false;
}
