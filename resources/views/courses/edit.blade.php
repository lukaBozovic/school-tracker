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
            Course edit
        </h2>
    </x-slot>

    <div class="container mt-5">
        <a class="btn btn-dark mb-5" href="{{ route('programs.show', $course->program_id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
            </svg>
        </a>
        <form method="post" action="{{route('courses.update', $course->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" value="{{old('name', $course->name)}}" class="form-control" aria-describedby="emailHelp">
                @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">ECTS</label>
                <input type="number" name="ects" value="{{old('ects', $course->ects)}}" class="form-control">
                @error('ects')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="number" name="semester" value="{{old('semester', $course->semester)}}" class="form-control">
                @error('semester')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" value="{{old('description', $course->description)}}" class="form-control">
                @error('description')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="program_id" value="{{$course->program_id}}">

            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>


</x-app-layout>
