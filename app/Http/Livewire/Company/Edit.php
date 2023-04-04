<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use App\Models\Contract;
use Illuminate\Validation\Rule;
use Monarobase\CountryList\CountryListFacade;

class Edit extends Component
{
    public $company, $name, $phone, $contact, $address, $email, $country, $vat_number;

    public function mount(Company $company)
    {
        $this->name = $company->name;
        $this->contact = $company->contact;
        $this->address = $company->address;
        $this->email = $company->email;
        $this->country = $company->country;
        $this->vat_number = $company->vat_number;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', Rule::unique(Company::class)->ignore($this->company)],
                'email' => ['string', Rule::unique(Company::class)->ignore($this->company), 'nullable'],
                'contact' => ['numeric', 'nullable', Rule::unique(Company::class)->ignore($this->company), 'nullable'],
                'phone' => ['numeric', 'nullable', Rule::unique(Company::class)->ignore($this->company), 'nullable'],
                'address' => ['string', 'nullable'],
                'country' => ['string', 'required'],
                'vat_number' => ['numeric', Rule::unique(Company::class)->ignore($this->company), 'nullable'],
            ],
        );
        $this->company->update($validatedData);
        session()->flash('success', 'Company updated successfully');
        return redirect()->route('companyDatatable');
    }

    public function render()
    {
        $countries = CountryListFacade::getList('en');
        return view('livewire.company.edit', compact('countries'));
    }
}
