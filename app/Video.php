<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    protected $guarded = [];


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($video) {
            $file_path = Storage::disk('public')->path($video->file);
            $logo = Storage::disk('public')->path("logo/logo.png");
            shell_exec('ffmpeg -y -i'. $file_path .'-i'. $logo .'-filter_complex "overlay=10:10"'. $file_path);
        });
    }

    public function getVideoAttribute()
    {
        return Storage::disk('public')->url($this->file);
    }

    public function getMimeAttribute()
    {
        return Storage::disk('public')->mimeType($this->file);
    }
}
