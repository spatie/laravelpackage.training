<?php

namespace App\Models;

use App\Http\App\Controllers\Videos\VideosController;
use App\Support\Vimeo\Vimeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use League\CommonMark\CommonMarkConverter;

class Video extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'video_completions');
    }

    public function getUrlAttribute(): string
    {
        return action([VideosController::class, 'show'], [$this->chapter->slug, $this->slug]);
    }

    public function getPreviousVideo(): ?Video
    {
        return Video::where('chapter_id', $this->chapter_id)
            ->where('sort', '<', $this->sort)
            ->orderByDesc('sort')
            ->limit(1)
            ->first();
    }

    public function getNextVideo(): ?Video
    {
        return Video::where('chapter_id', $this->chapter_id)
            ->where('sort', '>', $this->sort)
            ->orderBy('sort')
            ->limit(1)
            ->first();
    }

    protected function getDownloadUrls(): Collection
    {
        return Cache::remember('video_'.$this->id, now()->addMinute(), function () {
            $video = app(Vimeo::class)->getVideo($this->vimeo_id);

            return collect(Arr::get($video, 'download'));
        });
    }

    public function getDownloadHdUrlAttribute(): string
    {
        $download = $this->getDownloadUrls()->first(fn ($download) => $download['quality'] === 'hd');

        return $download['link'] ?? '';
    }

    public function getDownloadSdUrlAttribute(): string
    {
        $download = $this->getDownloadUrls()->first(fn ($download) => $download['quality'] === 'sd');

        return $download['link'] ?? '';
    }

    public function getDownloadHdSizeAttribute(): string
    {
        $download = $this->getDownloadUrls()->first(fn ($download) => $download['quality'] === 'hd');

        return $download['size'] ?? '';
    }

    public function getDownloadSdSizeAttribute(): string
    {
        $download = $this->getDownloadUrls()->first(fn ($download) => $download['quality'] === 'sd');

        return $download['size'] ?? '';
    }

    public function getFormattedDescriptionAttribute()
    {
        return (new CommonMarkConverter())->convertToHtml($this->description ?? '');
    }
}
