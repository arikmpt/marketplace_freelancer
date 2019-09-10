<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'project_id','owner_id','winner_id','price','unique_code',
        'fee_percentage','fee_price','is_paid','is_confirmation',
        'is_reject'
    ];

    public function project()
    {
        return $this->belongsTo(Transaction::class, 'project_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
}
