<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServicesCategory extends Model
{
    protected $guarded=[];
    use HasFactory;

    //get sub categories
    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class,'category_id');
    }
}
