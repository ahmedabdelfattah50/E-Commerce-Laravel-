<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategorie extends Model
{
    protected $table = 'main_categories';

    protected $fillable = [
        'name', 'translation_lang', 'translation_of' , 'slug','photo','active','created_at', 'updated_at'
    ];
}
