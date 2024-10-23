@extends('layouts.main')
@section('content')
<div class='container md:mx-auto'>
    <h2>Список студентов</h2>
    @foreach($students as $student)
    <div class='flex justify-between'>
        <img class='size-20' src="{{ $student->path_img }}" alt="{{ $student->lname }}">
        <p>
            <a href="{{route('students.show', $student->id)}}">
                {{ $student->lname }}
            </a>
        </p>
        <p>{{ $student->fname }}</p>
        <p>{{ $student->age }}</p>
        @isset($student->user->email )
        <p>{{ $student->user->email }}</p>
        @endisset
        @isset($student->group->title )
        <p>{{ $student->group->title }}</p>
        @endisset
        <form method="POST" action="{{route('students.destroy', $student->id)}}">
            @method('delete')
            @csrf
            <input type="submit" value="Удалить">
        </form>
    </div>
    @endforeach
    {{ $students->links() }}
</div>


<!-- Modal toggle -->
<button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    Создать студента
</button>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Создание нового студента
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Имя</label>
                            <input type="text" name="fname" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required />
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Фамилия</label>
                            <input type="text" name="lname" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                        </div>

                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Возраст</label>
                            <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="18" required />
                        </div>
                        <div>
                            <label for="group" class="block mb-2 text-sm font-medium text-gray-900">Группа</label>
                            <select id="group" name="group_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline text-gray-900 ">
                                @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Создать</button>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection()
