<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','company_id','status','poste','tel','photo'];
    
    public function scopeStatus($query){
        return $query->orderByDesc('id')->where('status',1)->paginate(6);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
