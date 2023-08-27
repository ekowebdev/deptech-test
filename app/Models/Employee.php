<?php

namespace App\Models;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = [];

    public function leaves(){
        return $this->hasMany(Leave::class);
    }
}
