<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','status','adresse','tel','photo'];
    
    public function scopeStatus($query){
        return $query->orderByDesc('id')->where('status',1)->paginate(6);
    }
}
