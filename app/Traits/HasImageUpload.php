<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait HasImageUpload
{
    protected function imageColumn(): string
    {
        return 'image';
    }

    protected function imageDirectory(): string
    {
        $model = class_basename($this);

        return 'uploads/' . Str::snake(Str::pluralStudly($model));
    }

    protected function imagePrefix(): string
    {
        return 'img';
    }

    public function updateImage(UploadedFile $file): string
    {
        $column    = $this->imageColumn();
        $directory = $this->imageDirectory();
        $prefix    = $this->imagePrefix();

        if ($this->{$column} && file_exists(public_path($this->{$column}))) {
            @unlink(public_path($this->{$column}));
        }

        if (! is_dir(public_path($directory))) {
            mkdir(public_path($directory), 0755, true);
        }

        $filename = uniqid($prefix . '_') . '.' . $file->getClientOriginalExtension();

        $file->move(public_path($directory), $filename);

        $this->update([
            $column => $directory . '/' . $filename
        ]);

        return $this->{$column};
    }
}