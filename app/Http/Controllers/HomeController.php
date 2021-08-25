<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkFile;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $work_files = WorkFile::where('email', auth()->user()->email)->get();
        return view('home')->with(compact('work_files', $work_files));
    }

    // function to store user file
    public function storeWorkFile(Request $request)
    {
        $request->validate([
            'summary_abstract' => 'required|mimes:pdf,docx|max:5120',
            'author_information' => 'required|mimes:pdf,docx|max:5120',
            'presentation_type' => 'min:5',
        ]);

        $data = $request->all();
        $summary_abstract = $request->file('summary_abstract');
        $author_information = $request->file('author_information');

        $as_name = $summary_abstract->getClientOriginalName();
        $extension = $summary_abstract->getClientOriginalExtension();
        $file_folder_woe = auth()->user()->id.'-'.md5($as_name.time());
        $folder = 'work_files/'.date('Y-m-d');
        $as_path = $summary_abstract->storeAs($folder, $file_folder_woe.'.'.$extension, 'public');

        $ai_name = $author_information->getClientOriginalName();
        $extension2 = $author_information->getClientOriginalExtension();
        $file_folder_woe2 = auth()->user()->id.'-'.md5($ai_name.time());
        $folder2 = 'work_files/'.date('Y-m-d');
        $ai_path = $author_information->storeAs($folder2, $file_folder_woe2.'.'.$extension2, 'public');


        $data['summary_abstract'] = $as_path;
        $data['author_information'] = $ai_path;
        $data['name'] = auth()->user()->name;
        $data['email'] = auth()->user()->email;
        $work_file = WorkFile::create($data);
        return redirect()->back();
    }

    // function to destroy work file
    public function destroyWorkFile($id)
    {
        $work_file = WorkFile::findOrFail($id);
        if (Storage::disk('public')->exists($work_file->summary_abstract)) {
            Storage::disk('public')->delete($work_file->summary_abstract);
        }
        if (Storage::disk('public')->exists($work_file->author_information)) {
            Storage::disk('public')->delete($work_file->author_information);
        }
        $work_file->delete();
        return redirect()->back();
    }
}
