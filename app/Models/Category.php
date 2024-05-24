<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model  implements TranslatableContract
{
    //interface TranslatableContract contains public methods only and doesnot have any properties 
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'content',"smalldescription"];
    protected $fillable = ['id', 'title', 'image', 'parent', 'created_at', 'updated_at']; 
}
