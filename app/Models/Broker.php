<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','address','broker_type'];

    public function invoices(){
        return $this->hasMany('App\Models\Invoice','broker_id');
    }
    public function items(){
        return $this->hasMany('App\Models\Item','broker_id');
    }
}
