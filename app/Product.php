<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='products';
    protected $primarykey='id';
    public $timestamps = false;

    protected $fillable=[
      'id','name','price', 'marks_id'
    ];

    public function mark()
    {
      return $this->hasmany(Mark::class);
    }
}
