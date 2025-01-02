<?php

namespace App\Livewire\Pages;

use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;

class ShopAdverts extends Component
{
    use WithPagination;

    // Search properties
    public $location = '';
    public $model = '';
    public $registrationYear = '';
    public $condition = '';
    public $engine = '';
    public $fuelType = '';
    public $transmission = '';
    public $color = '';
    public $make = '';
    public $makeSearch = '';
    public $startPrice = '';
    public $endPrice = '';

    public function resetFilters()
    {
        $this->resetPage();

        $this->reset([
            'location',
            'model',
            'registrationYear',
            'condition',
            'engine',
            'fuelType',
            'transmission',
            'color',
            'make',
            'makeSearch',
            'startPrice',
            'endPrice'
        ]);

        session()->flash('message', 'All cleared');
    }

    public function render()
    {
        $query = Listing::with('advert')
            ->where('status', 'approved')
            ->where('isActive', true);

        if ($this->makeSearch) {
            $query->whereHas('advert', function ($query) {
                $query->where('make', 'like', '%' . $this->makeSearch . '%')
                    ->orWhere('model', 'like', '%' . $this->makeSearch . '%');
            });
        }

        if (
            $this->location || $this->model || $this->registrationYear ||
            $this->condition || $this->engine || $this->fuelType ||
            $this->transmission || $this->color || $this->make || $this->makeSearch
            || $this->startPrice || $this->endPrice
        ) {

            $query->whereHas('advert', function ($query) {
                if ($this->location) {
                    $query->where('location', 'like', '%' . $this->location . '%');
                }
                if ($this->model && $this->model !== 'DEF') {
                    $query->where('model', $this->model);
                }
                if ($this->registrationYear) {
                    $query->where('registrationYear', $this->registrationYear);
                }
                if ($this->condition && $this->condition !== 'DEF') {
                    $query->where('condition', $this->condition);
                }
                if ($this->engine && $this->engine !== 'DEF') {
                    $query->where('engine', $this->engine);
                }
                if ($this->fuelType && $this->fuelType !== 'DEF') {
                    $query->where('fuelType', $this->fuelType);
                }
                if ($this->transmission && $this->transmission !== 'DEF') {
                    $query->where('transmission', $this->transmission);
                }
                if ($this->color && $this->color !== 'DEF') {
                    $query->where('color', $this->color);
                }
                if ($this->make && $this->make !== 'DEF') {
                    $query->where('make', $this->make);
                }
                if ($this->makeSearch) {
                    $query->where('make', 'like', '%' . $this->makeSearch . '%');
                }
                if ($this->startPrice !== '' && $this->endPrice !== '') {
                    $query->whereBetween('price', [$this->startPrice, $this->endPrice]);
                } elseif ($this->startPrice !== '') {
                    $query->where('price', '>=', $this->startPrice);
                } elseif ($this->endPrice !== '') {
                    $query->where('price', '<=', $this->endPrice);
                }
            });
        }

        $listings = $query->paginate(12);

        return view('livewire.pages.shop-adverts', [
            'listings' => $listings,
            'searchTerm' => $this->makeSearch
        ]);
    }
}
