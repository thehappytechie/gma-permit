<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Monarobase\CountryList\CountryListFacade;

class Create extends Component
{
    public $name;
    public $email;
    public $contact;
    public $phone;
    public $address;
    public $country;
    public $vat_number;

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', Rule::unique(Company::class)],
                'email' => ['string', Rule::unique(Company::class), 'nullable'],
                'contact' => ['numeric', Rule::unique(Company::class), 'nullable'],
                'phone' => ['numeric', Rule::unique(Company::class), 'nullable'],
                'address' => ['string', 'nullable'],
                'country' => ['string', 'nullable'],
                'vat_number' => ['numeric',  Rule::unique(Company::class), 'nullable'],
            ],
        );
        Company::create($validatedData);
        session()->flash('success', 'Company created successfully');
        return redirect()->route('companyDatatable');
    }

    public function render()
    {
        $countries = CountryListFacade::getList('en');
        return view('livewire.company.create', compact('countries'));
    }
}
