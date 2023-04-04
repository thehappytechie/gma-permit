<?php

namespace App\Http\Livewire\Contract;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Validation\Rule;

class AddCompany extends Component
{
    public $company_id, $name, $email, $contact, $country;

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->contact = '';
        $this->country = '';
    }

    protected $listeners = ['refresh' => '$refresh'];

    public function saveCompany()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique(Company::class)],
            'email' => ['required', Rule::unique(Company::class)],
            'contact' => ['numeric', 'nullable', Rule::unique(Company::class)],
            'country' => ['string', 'nullable'],
        ]);

        $company = Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'contact' => $this->email,
            'country' => $this->email,
        ]);
        $this->resetInputFields();
        session()->flash('success', 'Company created successfully.');
        $this->emit('refresh');
    }

    public function render()
    {
        $companies = Company::orderBy('name')->get(['id', 'name']);
        return view('livewire.contract.add-company', compact('companies'));
    }
}
