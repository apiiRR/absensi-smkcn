<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurus extends Model
{
    use HasFactory;

    protected $table = "jurusans";
    protected $fillable = ['nama'];
    public $timestamps = false;

    public function data()
    {
        return $this->hasMany(Data::class);
    }
}
