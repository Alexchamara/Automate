<div>
    <input type="hidden" name="removed_images" id="removed-images">
    <div class="grid grid-cols-3 gap-4">
        @foreach($images as $index => $image)
            <div class="relative group">
                <img src="{{ asset('uploads/' . $image) }}" 
                     alt="Vehicle Image" 
                     class="w-full h-48 object-cover rounded-lg"/>
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                    <button type="button" 
                            wire:click="removeImage({{ $index }})"
                            class="text-white hover:text-red-500">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('imagesUpdated', (event) => {
                document.getElementById('removed-images').value = JSON.stringify(event.removedImages);
            });
        });
    </script>
</div>