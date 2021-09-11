<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PublicationPart;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'scp_publication';

    public function parts()
    {
        return $this->hasMany(PublicationPart::class, 'publication_id');
    }
}
