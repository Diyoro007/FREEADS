<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    protected $table = 'ads';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'price',
        'location',
        'users_id',
        'condition',
    ];
}
