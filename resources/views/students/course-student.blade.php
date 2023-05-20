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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$student->user->name}} - {{$course->name}}
        </h2>
    </x-slot>

    @error('file')
    <script>
        $(document).ready(function () {
            // Open the modal automatically
            $('#openDocumentModal').trigger('click');
        });
    </script>
    @enderror
    @if($errors->has('name') || $errors->has('description') || $errors->has('points'))
    <script>
        $(document).ready(function () {
            // Open the modal automatically
            $('#openExamModal').trigger('click');
        });
    </script>
    @endif


    <div class="container mt-5">
        <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add new document</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('student-documents.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <input type="file" name="file" class="form-control">
                            @error('file')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button type="button" id="openDocumentModal" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#documentModal">
                    Add new document
                </button>
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @if($documents!=null)
                        @foreach($documents as $document)
                            <tr>
                                <td>
                                    {{$document->name}}
                                </td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{config('app.app_url') . $document->path}}">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>


            <div class="modal fade" id="examModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new exam</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('exams.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                Name <input type="text" class="form-control" name="name">
                                @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                Description <input type="text" class="form-control" name="description">
                                @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                Points <input type="number" step="0.1" class="form-control" name="points">
                                @error('points')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">Save changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="offset-2 col-6">
                <button type="button" id="openExamModal" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#examModal">
                    Add new exam
                </button>
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Points</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @if($exams!=null)
                        @foreach($exams as $exam)
                            <tr>
                                <td>
                                    {{$exam->name}}
                                </td>
                                <td>
                                    @if($exam->description!=null)
                                        {{$exam->description}}
                                    @else
                                        /
                                    @endif
                                </td>
                                <td>
                                {{$exam->points}}
                                <td>
                                    {{--                                    <a class="btn btn-primary"--}}
                                    {{--                                       href="{{config('app.app_url') . $document->path}}">Download</a>--}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</x-app-layout>
