<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
    ];

    protected $hidden = ['commentable_id', 'commentable_type'];

    use HasFactory;

    public function commentable()
    {
        return $this->morphTo();
    }
}
