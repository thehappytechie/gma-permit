<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Upload;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UploadReport extends Component
{

    use WithFileUploads;
    use AuthorizesRequests;

    public $file_name;
    public $full_name;
    public $report_period;
    public $terms = 0;

    public function save()
    {

        $validatedData = $this->validate(
            [
                'full_name' => ['required'],
                'report_period' => ['required', Rule::in(['1st quarter', '2nd quarter', '3rd quarter', '4th quarter'])],
                'file_name' => "required|mimes:pdf,doc,docx|max:22288",
            ],
            [
                'full_name.required' => 'Full name is required.',
                'report_period.required' => 'The report period is required.',
                'file_name.required' => 'File must be a pdf, doc, docx.',
            ]
        );
        $validatedData['file_name'] = $this->file_name->store('files', 'public');
        Upload::create($validatedData);
        session()->flash('success', 'Thank you! Your report has been successfully uploaded.');
        return redirect()->route('reportUploads');
    }

    public function render()
    {
        return view('livewire.upload-report');
    }
}
