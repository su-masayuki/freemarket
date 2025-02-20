<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Item extends Model
{
    use HasFactory;
    protected $fillable = ['item_name', 'price', 'item_describe', 'item_url','category', 'item_condition', 'is_sold', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function isLikedBy($user): bool
    {
        if (!$user) {
            return false;
        }
        return $this->likes->contains($user->id);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

}
