<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leave';

    protected $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
