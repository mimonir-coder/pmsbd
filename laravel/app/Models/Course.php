<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'sub_title',
        'fee',
        'featured_image',
        'promo_video_url',
        'overview',
        'content',
        'schedule',
        'registration_url',
        'brochure_path',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'fee' => 'decimal:2',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class);
    }

    public function featuredImageUrl(): ?string
    {
        return $this->featured_image ? asset('storage/'.$this->featured_image) : null;
    }

    public function brochureUrl(): ?string
    {
        return $this->brochure_path ? asset('storage/'.$this->brochure_path) : null;
    }

    public function youtubeEmbedUrl(): ?string
    {
        return self::normalizeYoutubeEmbed($this->promo_video_url);
    }

    public static function normalizeYoutubeEmbed(?string $url): ?string
    {
        if (! $url) {
            return null;
        }

        $url = trim($url);

        if (preg_match('#youtube\.com/embed/([a-zA-Z0-9_-]{6,})#', $url, $m)) {
            return 'https://www.youtube.com/embed/'.$m[1];
        }

        if (preg_match('#youtu\.be/([a-zA-Z0-9_-]{6,})#', $url, $m)) {
            return 'https://www.youtube.com/embed/'.$m[1];
        }

        if (preg_match('#[\\?&]v=([a-zA-Z0-9_-]{6,})#', $url, $m)) {
            return 'https://www.youtube.com/embed/'.$m[1];
        }

        return $url;
    }
}
