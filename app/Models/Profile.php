<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'bio',
        'user_id',
    ];

    /**
     * owner
     *
     * @return BelongsTo
     */
    public function owner() :BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }
}
