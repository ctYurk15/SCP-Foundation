<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ObjectClass;

class Item extends Model
{
    use HasFactory;

    protected $table = "scp_object";

    public function class()
    {
        return $this->belongsTo(ObjectClass::class, 'class_id');
    }
}
