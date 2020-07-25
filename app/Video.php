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
        static::creating(function (Video $video) {
            $file_path = Storage::disk('public')->path($video->file);
            $logo = Storage::disk('public')->path("logo/logo.png");
            $ext = shell_exec('ffprobe -v error -select_streams v:0 -show_entries stream=codec_name -of default=nokey=1:noprint_wrappers=1 '.$file_path);
            $ext = substr($ext, 0, -2);
            shell_exec('ffmpeg -y -i '. $file_path .' -i '. $logo .' -filter_complex "[1:v][0:v]scale2ref=(252/200)*ih/8/sar:ih/8[wm][base];[base][wm]overlay=10:10" '. Storage::disk('public')->path('').'temp'.$ext);
            shell_exec('mv -f '.Storage::disk('public')->path('').'temp '.$file_path);
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
