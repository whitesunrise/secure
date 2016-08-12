<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  protected $fillable = [
      'user_id', 'file_name', 'file_path',
  ];

  
}
