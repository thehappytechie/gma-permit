<?php

namespace App\Http\Livewire\Contract;

use App\Models\Company;
use Livewire\Component;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Department;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class Edit extends Component
{
    public $contracts, $status, $category_id, $department_id, $company_id, $title, $contract, $categories,
        $companies, $departments, $expiry_date, $contact_person, $start_date, $comment, $file_name;

    public function mount(Contract $contract)
    {
        $this->title = $contract->title;
        $this->status = $contract->status;
        $this->category_id = $contract->category_id;
        $this->company_id = $contract->company_id;
        $this->department_id = $contract->department_id;
        $this->contact_person = $contract->contact_person;
        $this->expiry_date = $contract->expiry_date;
        $this->start_date = $contract->start_date;
        $this->comment = $contract->comment;
        $this->file_name = $contract->file_name;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'title' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'contact_person' => ['required', 'string'],
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
            'comment' => $this->comment,
            'start_date' => $this->start_date,
            'expiry_date' => $this->expiry_date,
            'status' => $this->status,
            'contact_person' => $this->contact_person,
            'department_id' => $this->department_id,
            'file_name' =>  $this->file_name->store('public/files'),
        ]);

        $this->contract->update($validatedData);
        session()->flash('success', 'Company updated successfully');
        return redirect()->route('companyDatatable');
    }

    public function render()
    {
        $this->contracts = Contract::where('company_id', '=', $this->contract->company->id)->get();
        $this->categories = Category::all();
        $this->departments = Department::all();
        $this->companies = Company::all();
        return view('livewire.contract.edit');
    }
}
