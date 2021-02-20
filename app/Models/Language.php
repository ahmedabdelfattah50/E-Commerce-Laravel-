<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = [
        'name', 'abbr', 'locale' , 'native','direction','active','created_at', 'updated_at'
    ];

//    public static function create($query)
//    {
//        $query::create()->except(['_token']);
//    }public static function create(LanguageRequest $request)
////    {
////        $request->create(['name' => $request->name]);
////    }
//

//    public function scopeSelect($query){
//        return $query -> select('name', 'abbr','direction','active');
//    }

    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function scopeSelection($query){
        return $query -> select('name', 'abbr','direction','active');
    }
}
