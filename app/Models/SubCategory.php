<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    protected $guarded=[];
    use HasFactory;

    //Get Category
    public function category():BelongsTo
    {
        return $this->belongsTo(ServicesCategory::class);
    }
}
