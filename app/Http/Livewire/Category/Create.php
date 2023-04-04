<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public $name, $description;

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', Rule::unique(Category::class)],
                'description' => ['nullable', 'string'],
            ],
        );
        Category::create($validatedData);
        session()->flash('success', 'Category added successfully');
        return redirect()->route('categoryDatatable');
    }

    public function render()
    {
        return view('livewire.category.create');
    }
}
