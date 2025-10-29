<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobPosting::with('vendor')
            ->when($request->sort, function($q) use ($request) {
                if ($request->sort == 'new') $q->orderBy('created_at', 'desc');
                elseif ($request->sort == 'old') $q->orderBy('created_at', 'asc');
                elseif ($request->sort == 'salary_low') $q->orderBy('salary', 'asc');
                elseif ($request->sort == 'salary_high') $q->orderBy('salary', 'desc');
            })
            ->where('status', 1)
            ->paginate(9);

        return view('frontend.jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = JobPosting::with('vendor')->findOrFail($id);
        return view('frontend.jobs.show', compact('job'));
    }

    // Optional wishlist methods
    public function addToWishlist($id)
    {
        if(!Auth::check()) return redirect()->route('frontend.jobs.index');
        \DB::table('job_wishlists')->insert([
            'user_id' => Auth::id(),
            'job_id' => $id
        ]);
        return back();
    }

    public function removeFromWishlist($id)
    {
        if(!Auth::check()) return redirect()->route('frontend.jobs.index');
        \DB::table('job_wishlists')
            ->where('user_id', Auth::id())
            ->where('job_id', $id)
            ->delete();
        return back();
    }
}
