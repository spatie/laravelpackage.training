<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasUuid;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];

    public function activeLicenses(): HasMany
    {
        return $this->licenses()->where('expires_at', '>', now());
    }

    public function scopeHasAccessToRepo(Builder $query): void
    {
        $query->whereNotNull('github_username');
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class)->orderByDesc('created_at');
    }

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'video_completions');
    }

    public function canAccessVideos(): bool
    {
        return $this
            ->purchases()
            ->whereHas('product', function (Builder $query) {
                $query->whereIn('type', [Product::TYPE_VIDEOS]);
            })
            ->exists();
    }

    public function hasCompletedVideo(Video $video): bool
    {
        return $this->videos->contains($video);
    }

    public function hasLoggedInViaGitHub(): bool
    {
        return ! is_null($this->github_username);
    }
}
