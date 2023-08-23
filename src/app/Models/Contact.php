<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'gender',
        'email',
        'zip',
        'address',
        'building_name',
        'opinion'
    ];

    public function getGenderAttribute()
    {
        switch ($this->attributes['gender'])
        {
            case 1:
                return '男性';
            case 2;
                return '女性';
            default:
                return '全て';
        };
    }
    
}
