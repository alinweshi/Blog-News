<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class setting extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = [	'id',	'logo',	'favicon'	,'description',	'facebook',	'instgram',	'phone'	,'address',	'user_id',	'deleted_at'	,'created_at',	'updated_at'	
];
public static  function check_settings(){
    $settings=self::all();
if(count($settings)<1){
$data=[
    "id"=>1,
];
foreach(config('app.languages') as $key=>$value){
    $data[$key]["title"]=$value;
}
self::create($data);
}
return self::first();
}
}
