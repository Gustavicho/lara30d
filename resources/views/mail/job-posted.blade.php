<div>
    <h2>Success at creating the job!</h2>

    <p>You just posted the <strong>{{ $job->title }}</strong> job.</p>

    <a href='{{ url('/jobs/' . $job->id) }}'>See job</a>
</div>
