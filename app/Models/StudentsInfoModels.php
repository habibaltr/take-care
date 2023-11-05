<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsInfoModels extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    public $table = 'students_info';

    /**
     * @var bool
     */
    public $timestamps = false;
}
