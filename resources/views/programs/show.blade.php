<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
            crossorigin="anonymous"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Program show
        </h2>
    </x-slot>

    <div class="row container mt-3">
        <div class="col-3">
            <a class="btn btn-lg btn-dark" href="{{ url()->previous() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                    <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="row container">

        <div class="mt-5 col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Name:</h5>
                    <h6 class="card-title border-bottom mb-3">{{$program->name}}</h6>

                    <h5 class="card-title fw-bold">ECTS:</h5>
                    <h6 class="card-title border-bottom mb-3">{{$program->ects}}</h6>

                    <h5 class="card-title fw-bold">Number of years:</h5>
                    <h6 class="card-title border-bottom mb-3">{{$program->number_of_years}}</h6>

                    <h5 class="card-title fw-bold">Program type:</h5>
                    <h6 class="card-subtitle border-bottom mb-3">{{$program->programType->name}}</h6>

                    <h5 class="card-title fw-bold">Description:</h5>
                    <p class="card-text">{{$program->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-8 text-center">
            <h2 class="mt-5">Courses</h2>

            <div class="row">
{{--                <div class="col-4">--}}
{{--                    <form action="{{route('faculties.show', $faculty->id)}}">--}}
{{--                        <select onchange="this.form.submit()" class="form-select" name="program_type_id" aria-label="Choose program type">--}}
{{--                            <option value="" @if(Request::get('program_type_id') == null) selected @endif >All</option>--}}
{{--                            @foreach($program_types as $program_type)--}}
{{--                                <option @if(Request::get('program_type_id') == $program_type->id) selected @endif value="{{$program_type->id}}">{{$program_type->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </form>--}}

{{--                </div>--}}
                <div class="offset-4 col-4 float-end">
                    <a href="{{route('courses.create', $program->id)}}" class="btn btn-success">Add course</a>
                </div>
            </div>

            <table class="table mt-3">
                <thead>
                <th>Name</th>
                <th>ECTS</th>
                <th>Semester</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($program->courses as $course)
                    <tr>
                        <td>
                            {{$course->name}}
                        </td>
                        <td>
                            {{$course->ects}}
                        </td>
                        <td>
                            {{$course->semester}}
                        </td>
                        <td>
                            <div class="row text-center">
                                <a href="{{route('courses.show', $course->id)}}"
                                   class="btn btn-primary col-4">Show</a>

                                <form class="col-4" action="{{route('courses.destroy', $course->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('courses.edit', $course->id)}}"
                                   class="btn btn-warning col-4">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>


</x-app-layout>
