<div>
    {{ $media->media[0] }}
    <p class="mt-4 text-lg break-words">{{ $media->title }}</p>
    <p class="mt-1 text-sm text-gray-500">{{ $media->media[0]->human_readable_size }}</p>
    <input class="w-full px-3 py-2 mt-2 text-sm bg-white border" type="text" value="{{ $media->media[0]->getFullUrl() }}" readonly>

    <div class="mt-8 text-right">
        <button type="button" class="inline-block px-4 py-2 text-sm text-red-500" wire:click="deleteMedia">Hapus</button>
    </div>
</div>
