<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PageType;

class ItemPagePart extends Model
{
    use HasFactory;

    public $fillable = ['content', 'object_id', 'type_id', 'order', 'access_level'];
    protected $table="scp_object_page_part";

    public function page_type()
    {
        return $this->belongsTo(PageType::class, 'type_id');
    }
}
