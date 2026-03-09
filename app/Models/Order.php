<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice', 'name', 'email', 'phone',
        'address', 'total', 'payment_method', 'status', 'notes',
    ];

    protected function casts(): array
    {
        return [
            'total' => 'decimal:2',
        ];
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }

    public function getPaymentMethodLabelAttribute(): string
    {
        return match($this->payment_method) {
            'bank_transfer' => 'Bank Transfer',
            'ovo'           => 'OVO',
            'dana'          => 'Dana',
            'qris'          => 'QRIS',
            default         => ucfirst($this->payment_method),
        };
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'pending'   => 'badge-pending',
            'success'   => 'badge-success',
            'cancelled' => 'badge-cancelled',
            default     => 'badge-pending',
        };
    }
}
