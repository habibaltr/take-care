<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TecherStaffInfoModels extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    public $table = 'teacher_staff_info';

    /**
     * @var bool
     */
    public $timestamps = false;
}
