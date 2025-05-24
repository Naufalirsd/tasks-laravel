<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_name',
        'is_completed',
    ];

    // (Optional) If you want to relate to the user:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}