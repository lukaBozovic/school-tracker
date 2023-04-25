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
            Programs create
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="offset-3 col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Faculties</label>
                    <form action="{{route('students.create')}}">
                        <select onchange="this.form.submit()" class="form-select" name="faculty_id" aria-label="Choose program type">
                            <option value="" @if(Request::get('faculty_id') == null) selected @endif >All</option>
                            @foreach($faculties as $faculty)
                                <option @if(Request::get('faculty_id') == $faculty->id) selected @endif value="{{$faculty->id}}">{{$faculty->name}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <form method="post" action="{{route('students.store')}}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Index number</label>
                        <input type="text" name="index_number" class="form-control">
                        @error('index_number')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($currentPrograms)
                        <label class="form-label">Programs</label>
                        <select class="form-select mb-3" name="program_id" aria-label="Choose program">
                            @foreach($currentPrograms as $program)
                                <option value="{{$program->id}}">{{$program->name}}</option>
                            @endforeach
                        </select>
                    @endif

                    <button type="submit" class="btn btn-success mb-3">Submit</button>
                </form>
            </div>
        </div>


    </div>


</x-app-layout>
