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
    protected static function boot()
    {
        parent::boot();
        static::created(function ($video) {
            shell_exec('touch '.Storage::disk('public')->path('').'itworks');
            $file_path = Storage::disk('public')->path($video->file);
            $logo = Storage::disk('public')->path("logo/logo.png");
            shell_exec('ffmpeg -y -i '. $file_path .' -i '. $logo .' -filter_complex "[1:v][0:v]scale2ref=(4500/3580)*ih/8/sar:ih/8[wm][base];[base][wm]overlay=10:10" '. Storage::disk('public')->path('').'temp/'.$video->file);
            shell_exec('mv -f '.Storage::disk('public')->path('').'temp/'.$video->file.' '.$file_path);
            $video->update([
                'ready' => 1
            ]);
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
