<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'customer_code',
        'name',
        'email',
        'phone',
        'tax_number',
        'billing_address',
        'is_active',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class, 
            foreignKey: 'created_by'
            );
    }
}
