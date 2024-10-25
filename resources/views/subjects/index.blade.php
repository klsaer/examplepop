@extends('layouts.main')
@section('content')
<div class='container md:mx-auto'>
    @foreach($subjects as $subject)
    <div>{{ $subject->title  }}</div>
    @foreach($subject->students as $student)
    <div class="flex">
        <p>{{ $student->lname}}</p>
        <p>{{ $student->fname}}</p>
        <p>{{ $student->pivot->grade}}</p>
    </div>
    @endforeach

    @endforeach
</div>
@endsection()
