<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ObjectClass;
use App\Models\ItemPagePart;

class Item extends Model
{
    use HasFactory;

    protected $table = "scp_object";
    protected $fillable = ['number', 'name', 'class_id', 'photo', 'access_level'];

    public function class()
    {
        return $this->belongsTo(ObjectClass::class, 'class_id');
    }

    public function page_parts()
    {
        return $this->hasMany(ItemPagePart::class, 'object_id');
    }
}
