<?php

namespace App\Livewire;

use Livewire\Component;

class ImageManager extends Component
{
    public $listing;
    public $images = [];
    public $removedImages = [];

    public function mount($listing)
    {
        $this->listing = $listing;
        $this->images = json_decode($listing->advert->images) ?? [];
    }

    public function removeImage($index)
    {
        $removedImage = $this->images[$index];
        $this->removedImages[] = $removedImage;
        array_splice($this->images, $index, 1);
        $this->dispatch('imagesUpdated', [
            'images' => $this->images,
            'removedImages' => $this->removedImages
        ]);
    }

    public function render()
    {
        return view('livewire.image-manager');
    }
}