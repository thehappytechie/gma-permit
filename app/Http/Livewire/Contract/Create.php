<?php

namespace App\Http\Livewire\Contract;

use App\Models\Company;
use Livewire\Component;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Department;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public  $title, $status, $category_id, $narration, $expiry_date, $start_date, $contract_type,
        $department_id, $contact_person, $comment, $file_name, $company_id,
        $name, $email, $contact, $country, $contract_code, $contract_scope, $address;

    public function submitForm()
    {
        $validatedData = $this->validate([
            'title' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'company_id' => ['required', 'exists:companies,id'],
            'contact_person' => ['required', 'string'],
            'contract_code' => ['string', Rule::unique(Contract::class), 'nullable'],
            'contract_scope' => ['string', 'nullable'],
            'status' => ['required', 'string', Rule::in([
                'draft', 'active', 'pending', 'terminated', 'archived',
                'in-negotiating', 'expired', 'superseded'
            ])],
            'start_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date'],
            'comment' => ['string', 'nullable'],
            'file_name' => [
                File::types(['pdf'])
                    ->max(12288), 'nullable'
            ],
        ]);

        $contract = Contract::create([
            'title' => $this->title,
            'category_id' => $this->category_id,
            'department_id' => $this->department_id,
            'company_id' => $this->company_id,
            'contract_code' => $this->contract_code,
            'contract_scope' => $this->contract_scope,
            'comment' => $this->comment,
            'start_date' => $this->start_date,
            'expiry_date' => $this->expiry_date,
            'status' => $this->status,
            'contact_person' => $this->contact_person,
            'department_id' => $this->department_id,
            'file_name' =>  $this->file_name->store('public/files'),
        ]);

        session()->flash('success', 'Contract created successfully.');
        return redirect()->route('dashboard');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
        $this->contact = '';
        $this->country = '';
    }

    protected $listeners = ['refresh' => '$refresh'];

    public function saveCompany()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique(Company::class)],
            'address' => ['required', Rule::unique(Company::class), 'nullable'],
            'contact' => ['numeric', Rule::unique(Company::class), 'nullable'],
            'country' => ['required', 'string'],
        ]);

        $company = Company::create([
            'name' => $this->name,
            'address' => $this->address,
            'contact' => $this->contact,
            'country' => $this->country,
        ]);

        $this->resetInputFields();
        session()->flash('success', 'Company created successfully.');
        $this->emit('refresh');
    }

    public function saveCategory()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique(Category::class)],
        ]);

        $category = Category::create([
            'name' => $this->name,
        ]);

        $this->resetInputFields();
        session()->flash('success', 'Category created successfully.');
        $this->emit('refresh');
    }

    public function render()
    {
        $countries = CountryListFacade::getList('en');
        $categories = Category::get(['id', 'name']);
        $departments = Department::get(['id', 'name']);
        $companies = Company::orderBy('name')->get(['id', 'name']);
        return view('livewire.contract.create', compact(['companies', 'departments', 'categories', 'countries']));
    }
}
