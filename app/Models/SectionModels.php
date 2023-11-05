<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassModels;

class SectionModels extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    public $table = 'section';

    /**
     * @var bool
     */
    public $timestamps = false;

 
// public function classModel()
// {
//     return $this->belongsTo(ClassModels::class, 'class_id'); 

// }
}
