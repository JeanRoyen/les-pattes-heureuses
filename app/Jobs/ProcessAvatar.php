<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProcessAvatar implements ShouldQueue
{
    use Queueable;

    protected string $file_name;
    protected string $full_path;

    /**
     * Create a new job instance.
     */
    public function __construct(string $file_name, string $full_path)
    {
        $this->file_name = $file_name;
        $this->full_path = $full_path;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $image_content = Storage::disk('public')->get($this->full_path);
        $image = Image::read($image_content);
        $sizes = [
            150,
            300,
            600
        ];
        $compression = 85;

        $variant_path_template = 'avatars/%s/';
        foreach ($sizes as $size) {
            $resize_image = $image->scale($size, $size)->toJpeg($compression);
            $variant_path = sprintf($variant_path_template, $size);
            $full_variant_path = $variant_path . '/' . $this->file_name;
            Storage::disk('public')->put($full_variant_path, $resize_image);
        }
    }
}
