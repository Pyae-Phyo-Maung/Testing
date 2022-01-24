<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['broker_id','invoice_no','date'];

    public function broker(){
        return $this->belongsTo('App\Models\Broker','broker_id');
    }
}
