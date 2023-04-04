<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Upload;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportUploadController extends Controller
{
    public function reportUploads(Request $request)
    {
        if ($request->ajax()) {
            $uploads = Upload::with('agent')->get();
            return DataTables::of($uploads)
                ->addColumn('action', function ($upload) {
                    return '<a class="btn btn--subtle btn--sm" href="storage/' .
                        $upload->file_name . '" target="__blank" title="Preview">
                        <svg width="12" height="12" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                        </a>
                         <a class="btn btn--subtle btn--sm" href="storage/' .
                        $upload->file_name . '" target="__blank" title="Download" download>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                        </svg>
                        </a>
                    ';
                })
                ->editColumn('agency', function (Upload $upload) {
                    return  $upload->agent->name;
                })
                ->editColumn('created_at', function (Upload $upload) {
                    return  Carbon::parse($upload->created_at)->format('d M, Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.report-uploads');
    }

}
