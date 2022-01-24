<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['broker_id','name','original_qty','remain_qty','price'];
    public function broker(){
        return $this->belongsTo('App\Models\Broker','broker_id');
    }
}
