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
            Course show
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
    <div class="container">
        <div class="row margin-auto text-center">

            <div class="mt-5 offset-2 col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Name:</h5>
                        <h6 class="card-title border-bottom mb-3 pb-3">{{$course->name}}</h6>

                        <h5 class="card-title fw-bold">ECTS:</h5>
                        <h6 class="card-title border-bottom mb-3 pb-3">{{$course->ects}}</h6>

                        <h5 class="card-title fw-bold">Semester:</h5>
                        <h6 class="card-title border-bottom mb-3 pb-3">{{$course->semester}}</h6>

                        <h5 class="card-title fw-bold">Program:</h5>
                        <h6 class="card-subtitle border-bottom mb-3 pb-3">{{$course->program->name}}</h6>

                        <h5 class="card-title fw-bold">Description:</h5>
                        <p class="card-text">{{$course->description}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>



</x-app-layout>
