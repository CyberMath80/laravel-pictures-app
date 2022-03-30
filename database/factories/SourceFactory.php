<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Source;
use App\Models\Photo;
use Str;

class SourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Source::class;

    public function definition()
    {
        $width = 640;
        $height = 480;
        $path = $this->faker->image('public/storage/photo', $width, $height, null, true, true, true, false);

        return [
            'photo_id' => Photo::factory(),
            'path' => $path,
            'url' => config('app.url').'/'.Str::after($path, 'public/'),
            'size' =>rand(1111, 9999),
            'width' => $width,
            'height' => $height,
        ];
    }
}
