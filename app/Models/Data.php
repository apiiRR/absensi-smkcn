<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';

    protected $fillable = ['date', 'day', 'time_in', 'activity', 'user_id', 'jurusan_id', 'attedance'];
    public $timestamps = true;

    public function jurusan()
    {
        return $this->belongsTo(Jurus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
