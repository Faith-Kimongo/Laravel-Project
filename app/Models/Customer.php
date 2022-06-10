<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    // protected $fillable =['name', 'email', 'active'];

    protected $guarded = [];

    public function getActiveAttribute($attribute)
    {
        return [
            0 => 'Inactive',
            1 => 'Active',
        ][$attribute];
    }

    public function scopeActive($query) 
    {
        return $query->where('active', 1);

    }

    public function scopeInactive($query) 
    {
        return $query->where('active', 0);
    }

    //rltnshp btn customers and a company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
