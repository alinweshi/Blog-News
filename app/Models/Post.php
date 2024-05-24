<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['title',"content","smalldescription"];
    protected $fillable = ['title', 'image',"content","smalldescription"];

    public function userCanUpdate(User $user)
    {
        return $this->authorize('update', $user);
    }
    public function userCanDelete(User $user)
    {
        return $this->authorize('delete', $user);
    }
    public function userCanCreateComment(User $user)
    {
        return $this->authorize('createComment', $user);
    }

}
