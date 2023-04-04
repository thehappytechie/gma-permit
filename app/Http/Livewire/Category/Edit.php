<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $category, $name, $description;

    public function mount(Category $category)
    {
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', Rule::unique(Category::class)->ignore($this->category)],
                'description' => ['nullable', 'string'],
            ],
        );
        $this->category->update($validatedData);
        session()->flash('success', 'Category updated successfully');
        return redirect()->route('categoryDatatable');
    }

    public function render()
    {
        return view('livewire.category.edit');
    }
}
