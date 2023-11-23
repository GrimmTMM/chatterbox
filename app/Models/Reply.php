<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;

    public function complaint(): BelongsTo {
        return $this->belongsTo(Complaint::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
