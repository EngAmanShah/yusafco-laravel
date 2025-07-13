<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Good practice to add this
use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    use HasFactory; // Good practice to add this

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'section_key',
        'content_value',
    ];
}