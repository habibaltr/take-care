<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModels extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    public $table = 'class';

    /**
     * @var bool
     */
    public $timestamps = false;
}
