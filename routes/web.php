<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(10);

    return view('jobs.index', ['jobs' => $jobs]);
});

// create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'min_digits:4'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

// edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'min_digits:4'],
    ]);

    $job = Job::findOrfail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/'.$job->id);
});

// destroy
Route::delete('/jobs/{id}', function ($id) {
    Job::findOrfail($id)->delete();

    return redirect('jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
