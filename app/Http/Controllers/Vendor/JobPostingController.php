<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPosting;
use Auth;
use Validator;

class JobPostingController extends Controller
{
    public function create()
    {
        return view('vendors.job_posting.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        JobPosting::create([
            'vendor_id' => Auth::guard('vendor')->id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'deadline' => $request->deadline,
            'status' => 1
        ]);

        return redirect()->route('vendor.job_posting.listing')->with('success', 'Job Posting added successfully!');
    }

    public function listing()
    {
        $jobs = JobPosting::where('vendor_id', Auth::guard('vendor')->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('vendors.job_posting.listing', compact('jobs'));
    }

    public function edit($id)
    {
        $job = JobPosting::where('vendor_id', Auth::guard('vendor')->id())->findOrFail($id);
        return view('vendors.job_posting.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = JobPosting::where('vendor_id', Auth::guard('vendor')->id())->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect()->route('vendor.job_posting.listing')->with('success', 'Job Posting updated successfully!');
    }

    public function destroy($id)
    {
        $job = JobPosting::where('vendor_id', Auth::guard('vendor')->id())->findOrFail($id);
        $job->delete();

        return redirect()->route('vendor.job_posting.listing')->with('success', 'Job Posting deleted successfully!');
    }
}
