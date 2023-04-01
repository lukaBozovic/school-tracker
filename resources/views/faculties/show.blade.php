<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Faculties show
        </h2>
    </x-slot>

    <div class="row container">
        <div class="mt-5 col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Name:</h5>
                    <h6 class="card-title border-bottom mb-3">{{$faculty->name}}</h6>

                    <h5 class="card-title fw-bold">Year of foundation:</h5>
                    <h6 class="card-title border-bottom mb-3">{{$faculty->year_of_foundation}}</h6>

                    <h5 class="card-title fw-bold">City:</h5>
                    <h6 class="card-subtitle border-bottom mb-3">{{$faculty->city}}</h6>

                    <h5 class="card-title fw-bold">Country:</h5>
                    <h6 class="card-subtitle border-bottom mb-3">{{$faculty->country}}</h6>

                    <h5 class="card-title fw-bold">Description:</h5>
                    <p class="card-text">{{$faculty->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-8 text-center">
            <h2 class="mt-5">Programs</h2>

            <div class="row">
                <div class="col-4">
                    <select class="form-select" aria-label="Choose program type">
                        <option selected>Choose program type</option>
                        @foreach($program_types as $program_type)
                            <option value="{{$program_type->id}}">{{$program_type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="table mt-3">
                <thead>
                <th>Name</th>
                <th>ECTS</th>
                <th>Number of years</th>
                </thead>
                <tbody>
                @foreach($faculty->programs as $program)
                    <tr>
                        <td>
                            {{$program->name}}
                        </td>
                        <td>
                            {{$program->ects}}
                        </td>
                        <td>
                            {{$program->number_of_years}}
                        </td>
{{--                        <td>--}}
{{--                            <div class="row">--}}
{{--                                <a href="{{route('faculties.show', $faculty->id)}}" class="btn btn-primary col-4">Show</a>--}}

{{--                                <form class="col-4" action="{{route('faculties.destroy', $faculty->id)}}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <input type="hidden" name="currentPage" value="{{ $faculties->currentPage()}}">--}}
{{--                                    <input type="hidden" name="total" value="{{ $faculties->total()}}">--}}
{{--                                    <input type="hidden" name="perPage" value="{{ $faculties->perPage()}}">--}}
{{--                                    <button class="btn btn-danger">Delete</button>--}}
{{--                                </form>--}}
{{--                                <a href="{{route('faculties.edit', $faculty->id)}}" class="btn btn-warning col-4">Edit</a>--}}
{{--                            </div>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>



</x-app-layout>
