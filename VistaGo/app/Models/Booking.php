<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'destination_id', 'guide_id', 'visit_date', 'end_date', 'visit_time', 'status', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}
