<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Source, Photo};
use Image, Storage, Str;

class ResizePhoto implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Source $source;
    protected Photo $photo;
    protected string $ext;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Source $source, Photo $photo, string $ext)
    {
        $this->source = $source;
        $this->photo = $photo;
        $this->ext = $ext;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $thumbnailImage = Image::make(Storage::get($this->source->path))->fit(350, 233, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode($this->ext, 50);

        $filename = Str::uuid().'.'.$this->ext;
        $thumbnailPath = 'photo/'.$this->photo->album_id.'/thumbnails/'.$filename;
        Storage::put($thumbnailPath, $thumbnailImage);
        $this->photo->thumbnail_path = $thumbnailPath;
        $this->photo->thumbnail_url = Storage::url($thumbnailPath);
        $this->photo->save();

        for($i = 2; $i <= 6; $i++) {
            $width = (int) round($this->source->width / $i);
            $height = (int) round($this->source->height / $i);

            $img = Image::make(Storage::get($this->source->path))->fit($width, $height, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode($this->ext);

            $filename = Str::uuid().'.'.$this->ext;
            $path = 'photo/'.$this->photo->album_id.'/'.$filename;
            Storage::put($path, $img);

            $this->photo->sources()->create([
                'path' => $path,
                'url' => Storage::url($path),
                'size' => Storage::size($path),
                'width' => $width,
                'height' => $height,
            ]);

            $this->photo->active = true;
            $this->photo->save();
        }
    }
}
