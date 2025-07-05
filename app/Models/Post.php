<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- Import ini

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'user_id',
    ];

    /**
     * Mendefinisikan relasi bahwa setiap Post 'milik' satu User.
     * Nama fungsi ini (user) harus sama dengan yang dipanggil di with('user').
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
