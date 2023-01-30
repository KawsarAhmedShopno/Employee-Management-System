<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $casts = [
        'name' => 'array',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
