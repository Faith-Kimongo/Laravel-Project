<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    //adding relationship between company and customers
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
