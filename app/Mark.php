<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
    protected $table='marks';
    protected $primarykey='id';
    public $timestamps = false;

    protected $fillable=[
      'id','name'
    ];

    public function Product()
    {
      # code...
      return $this->belongsto(Product::class);
    }
}
