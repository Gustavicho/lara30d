<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(10);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        Gate::authorize('create-job');

        return view('jobs.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min_digits:4'],
        ]);

        $job = Job::create([
            ...$attributes,
            'employer_id' => Auth::user()->employer->id,
        ]);

        Mail::to($job->employer->user)->send(new \App\Mail\JobPosted($job));

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //  authorize ...

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min_digits:4'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('jobs');
    }
}
