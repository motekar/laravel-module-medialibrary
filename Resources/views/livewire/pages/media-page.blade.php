<div class="flex flex-col w-full h-full"
    x-data="{
        isUploading: false,
        progress: 0,
        selectedId: null,
        selectMedia(id) {
            this.selectedId = id;
            this.$wire.selectMedia(id);
        },
    }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false; progress = 0"
    x-on:livewire-upload-error="isUploading = false; progress = 0"
    x-on:livewire-upload-progress="progress = $event.detail.progress">

    <div class="flex items-center p-4 bg-gray-100 border-b shrink-0">
        <label class="relative px-4 py-2 text-sm transition bg-white rounded shadow cursor-pointer hover:bg-gray-50 active:bg-gray-200 focus-within:outline outline-offset-2 outline-2 outline-blue-500">
            <input class="absolute w-1 h-1 opacity-0" type="file" wire:model="file">
            <span>Upload</span>
        </label>
        @error('file')
        <p class="ml-4 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex min-h-0 grow">
        <div class="overflow-y-auto grow">
            <div class="grid gap-4 p-4 grid-cols-auto">
                <div x-show="isUploading" class="flex p-2 rounded-md select-none" style="display: none;">
                    <div class="w-16 h-16 bg-gray-100 rounded shadow-md shrink-0"></div>
                    <div class="min-w-0 ml-2 grow">
                        <p class="text-sm break-words"><span x-text="progress"></span>%</p>
                        <div
                            class="w-full h-1 mt-2 bg-gray-200 rounded"
                            role="progressbar"
                            :aria-valuenow="progress"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            >
                            <div
                                class="h-1 bg-blue-500 rounded"
                                :style="`width: ${progress}%; transition: width 2s;`"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($mediaContents as $media)
                <div
                    class="flex p-2 transition rounded-md cursor-pointer select-none"
                    :class="{
                        'bg-gray-100 hover:bg-gray-200': selectedId == {{ $media['id'] }},
                        'hover:bg-gray-100': selectedId != {{ $media['id'] }},
                    }"
                    @click="selectMedia({{ $media['id'] }})"
                    title="{{ htmlspecialchars($media['title'], ENT_QUOTES) }}">
                    <div class="w-16 h-16 overflow-hidden rounded shadow-md shrink-0">
                        <img class="object-cover w-full h-full" src="{{ $media['url'] }}" alt="">
                    </div>
                    <div class="min-w-0 ml-2 grow">
                        <p class="text-sm break-words line-clamp-2">{{ $media['title'] }}</p>
                        <p class="mt-2 text-xs text-gray-500">{{ $media['size'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @if ($selected != null)
        <div class="p-4 bg-gray-100 border-l shrink-0 w-80">
            <livewire:medialibrary::components.media-preview :media="$selected" :wire:key="$selected->id">
        </div>
        @endif
    </div>
</div>
