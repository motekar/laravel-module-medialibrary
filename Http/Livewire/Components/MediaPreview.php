<?php

namespace Modules\MediaLibrary\Http\Livewire\Components;

use Livewire\Component;
use Modules\MediaLibrary\Entities\MediaContent;

class MediaPreview extends Component
{
    /** @var MediaContent $media */
    public $media;

    public function mount($media)
    {
        $this->media = $media;
    }

    public function render()
    {
        return view('medialibrary::livewire.components.media-preview');
    }

    public function deleteMedia()
    {
        $this->emit('deleteMedia', $this->media);
    }
}
