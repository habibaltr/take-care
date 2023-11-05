<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionModels extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    public $table = 'patients';

    /**
     * @var bool
     */
    public $timestamps = false;
}
