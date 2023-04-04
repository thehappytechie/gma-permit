<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use App\Models\Company;
use Monarobase\CountryList\CountryListFacade;

class Show extends Component
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

    public function render()
    {
        $countries = CountryListFacade::getList('en');
        return view('livewire.company.show', compact('countries'));
    }
}
