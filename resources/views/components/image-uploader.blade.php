<div class="image-uploader">
    <x-text-input :type="$type" :name="$name" :id="$id" :multiple="$multiple" :accept="$accept" />
    <label for="image-input">
        <i class="fa-solid fa-plus" style="color: rgb(11, 25, 111);"></i><br>
        Add <span id="remaining-count">20</span> photos 
    </label>
    <div class="image-preview" id="image-preview"></div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image-input');
            const imagePreview = document.getElementById('image-preview');
            const remainingCount = document.getElementById('remaining-count');
            const MAX_FILES = 20;
            let selectedFiles = new DataTransfer();

            function updateRemainingCount() {
                const remaining = MAX_FILES - selectedFiles.files.length;
                remainingCount.textContent = remaining;
            }

            imageInput.addEventListener('change', function() {
                const newFiles = Array.from(this.files);
                const totalFiles = selectedFiles.files.length + newFiles.length;

                if (totalFiles > MAX_FILES) {
                    alert(`You can only upload up to ${MAX_FILES} images`);
                    return;
                }

                newFiles.forEach((file, index) => {
                    if (!file.type.startsWith('image/')) {
                        alert('Please upload only images');
                        return;
                    }

                    selectedFiles.items.add(file);
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'image-container';
                        div.dataset.fileIndex = selectedFiles.files.length - 1;
                        div.innerHTML = `
                    <img src="${e.target.result}" class="preview-image" alt="Preview">
                    <button type="button" class="remove-btn" title="Remove image">×</button>
                `;

                        div.querySelector('.remove-btn').addEventListener('click', function() {
                            const fileIndex = parseInt(div.dataset.fileIndex);
                            const newFiles = new DataTransfer();

                            Array.from(selectedFiles.files)
                                .filter((_, index) => index !== fileIndex)
                                .forEach(file => newFiles.items.add(file));

                            selectedFiles = newFiles;
                            imageInput.files = selectedFiles.files;
                            div.remove();
                            updatePreviewIndexes();
                        });

                        imagePreview.appendChild(div);
                    };

                    reader.readAsDataURL(file);
                });

                imageInput.files = selectedFiles.files;

                updateRemainingCount();
            });

            function updatePreviewIndexes() {
                Array.from(imagePreview.children).forEach((div, index) => {
                    div.dataset.fileIndex = index;
                });
            }

            // Update remove button click handler
            div.querySelector('.remove-btn').addEventListener('click', function() {
                const fileIndex = parseInt(div.dataset.fileIndex);
                const newFiles = new DataTransfer();

                Array.from(selectedFiles.files)
                    .filter((_, index) => index !== fileIndex)
                    .forEach(file => newFiles.items.add(file));

                selectedFiles = newFiles;
                imageInput.files = selectedFiles.files;
                div.remove();
                updatePreviewIndexes();
                updateRemainingCount();
            });
        });
    </script>

    @push('styles')
        <style>
            .image-uploader {
                margin: 20px 0;
            }

            .image-preview {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 1rem;
                margin-top: 1rem;
            }

            .image-container {
                position: relative;
                aspect-ratio: 1;
                border: 1px solid #ddd;
                border-radius: 0.5rem;
                overflow: hidden;
                background: #f5f5f5;
            }

            .preview-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .remove-btn {
                position: absolute;
                top: 5px;
                right: 5px;
                background: rgba(255, 0, 0, 0.8);
                color: white;
                border: none;
                border-radius: 50%;
                width: 24px;
                height: 24px;
                font-size: 16px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.3s ease;
            }

            .remove-btn:hover {
                background: rgba(255, 0, 0, 1);
            }
        </style>
    @endpush
@endpush
