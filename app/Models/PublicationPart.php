<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PageType;

class PublicationPart extends Model
{
    use HasFactory;

    protected $table = 'scp_publication_page_part';
    public $fillable = ['content', 'publication_id', 'type_id', 'order', 'access_level'];

    public function page_type()
    {
        return $this->belongsTo(PageType::class, 'type_id');
    }
}
