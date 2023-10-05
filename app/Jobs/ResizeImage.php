<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $path;
    private $name;
    private $width;
    private $height;

    /**
     * Create a new job instance.
     */
    public function __construct($_path, $_width, $_height)
    {
        $this->path = dirname($_path);
        $this->name = basename($_path);
        $this->width = $_width;
        $this->height = $_height;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $srcPath = storage_path().'/app/public/'.$this->path.'/'.$this->name;
        $destPath = storage_path().'/app/public/'.$this->path.'/'.$this->width.'x'.$this->height.'_'.$this->name;

        //$croppedImage = Image::load($srcPath)->width($this->width)->height($this->height)->save($destPath);
        $croppedImage = Image::load($srcPath)->crop(Manipulations::CROP_CENTER, $this->width, $this->height)->save($destPath);
    }
}
