<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
    ];

    protected $casts = [
        'lables'=>'array',
    ];


    public function getImageCropped($imgPath, $width, $height)
    {
        if (!$width && !$height) {
            return Storage::url($imgPath);
        }

        return Storage::url(dirname($imgPath).'/'.$width.'x'.$height.'_'.basename($imgPath));
    }

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
