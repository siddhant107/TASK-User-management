<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'created_by',
        'end_date',
        'task_done'
    ];

    protected $casts = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}