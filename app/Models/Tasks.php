<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    protected $fillable = ['type','description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use softDeletes;
    protected $dates = ['deleted_at'];
}
