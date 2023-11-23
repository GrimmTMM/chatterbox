<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chatter extends Model
{
    use HasFactory;

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function replies(): HasMany {
        return $this->hasMany(Reply::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected $dates = ['created_at'];
}
