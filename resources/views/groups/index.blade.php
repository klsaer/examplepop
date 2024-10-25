@extends('layouts.main')
@section('content')
<div class='container md:mx-auto'>
    <h2>Список групп</h2>
    @foreach($groups as $group)

        <div>{{$group->title}}</div>

        @foreach($group->adultStudents as $student)
            <div class='flex justify-between'>
                <img class='size-20' src="{{ $student->path_img }}" alt="{{ $student->lname }}">
                <p>
                    <a href="{{route('students.show', $student->id)}}">
                        {{ $student->lname }}
                    </a>
                </p>
                <p>{{ $student->fname }}</p>
                <p>{{ $student->age }}</p>
            </div>
        @endforeach

    @endforeach
</div>
@endsection()

