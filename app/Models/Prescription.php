<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'file_path'
    ];

    /**
     * Get the customer who uploaded this prescription
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get all orders that use this prescription
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the full URL to access the prescription file
     */
    public function getFileUrlAttribute(): string
    {
        return asset('storage/'.$this->file_path);
    }

    /**
     * Get only the filename (without path)
     */
    public function getFileNameAttribute(): string
    {
        return basename($this->file_path);
    }
}