<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Courses
        </h2>
    </x-slot>

{{--    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    ...--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container mt-5">

                <form action="{{route('export-courses')}}">
                    <div class="row">
                        <div class="col-4">
                            <select class="form-select" name="mark" aria-label="Choose filter">
                                <option selected value="">ALL</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-success">Export</button>
                        </div>
                    </div>
                </form>

        <table class="table">
            <thead>
            <th>Name</th>
            <th>ECTS</th>
            <th>Semester</th>
            <th>Total points</th>
            <th>Mark</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($courses as $courses)
                @php($totalPoints = $courses->courseStudents->first()?->totalPoints ?? number_format(0, 2))
                <tr class="@if($totalPoints >=50)table-success @else table-danger @endif">
                    <td>
                        {{$courses->name}}
                    </td>
                    <td>
                        {{$courses->ects}}
                    </td>
                    <td>
                        {{$courses->semester}}
                    </td>
                    <td>
                        {{$totalPoints}}
                    </td>
                    <td>
                        @if($totalPoints >= 90)
                            A
                        @elseif($totalPoints >= 80)
                            B
                        @elseif($totalPoints >= 70)
                            C
                        @elseif($totalPoints >= 60)
                            D
                        @elseif($totalPoints >= 50)
                            E
                        @else
                            F
                        @endif
                    </td>
                    <td>
{{--                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                            Launch demo modal--}}
{{--                        </button>--}}
                        <a href="{{route('student-course', [$courses->id, auth()->user()->student->id])}}" class="btn btn-primary">Show</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</x-app-layout>
