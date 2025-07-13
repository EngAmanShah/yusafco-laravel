<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceRequest extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'request_id'; // <-- THIS IS THE CRITICAL FIX

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'service_type',
        'product_name',
        'quantity_kg',
        'notes',
        'status',
    ];

    /**
     * Get the user that owns the service request.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}