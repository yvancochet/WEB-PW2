<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'email',
        'address',
        'picture',
        'birthday_date',
        'note',
    ];

}
