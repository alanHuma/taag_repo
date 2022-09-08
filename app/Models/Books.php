<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = ['author', 'title', 'edition','publication_data','content_type','restriction', 'matter','provider'];  //DATA THAT IS INSERT   

}
