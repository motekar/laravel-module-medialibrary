<?php

namespace Modules\MediaLibrary\Http\Livewire\Pages;

use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\MediaLibrary\Entities\MediaContent;

class MediaPage extends Component
{
    use WithFileUploads;

    protected $listeners = ['deleteMedia'];

    /** @var UploadedFile $file */
    public $file;

    /** @var MediaContent $selected */
    public $selected;

    public function render()
    {
        return view('medialibrary::livewire.pages.media-page', [
            'mediaContents' => MediaContent::with(['media'])
                ->latest()->get()
                ->transform(function ($m) {
                    $media = $m->media[0];

                    return [
                        'id' => $m->id,
                        'title' => $m->title,
                        'url' => $media->getFullUrl(),
                        'size' => $media->human_readable_size,
                    ];
                }),
        ])
            ->extends('medialibrary::layouts.master');
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => ['image'],
        ]);

        /** @var MediaContent $mediaContent */
        $mediaContent = MediaContent::create([
            'title' => $this->file->getClientOriginalName(),
        ]);

        $mediaContent->addMedia($this->file->getRealPath())
            ->toMediaCollection();

        $this->file = null;
    }

    public function selectMedia($id)
    {
        $this->selected = MediaContent::with(['media'])->find($id);
    }

    public function deleteMedia(MediaContent $media)
    {
        $this->selected = null;
        $media->delete();
    }
}
