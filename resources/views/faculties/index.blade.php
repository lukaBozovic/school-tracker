<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Faculties
        </h2>
    </x-slot>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Description</th>
            </thead>
            <tbody>
            @foreach($faculties as $faculty)
                <tr>
                    <td>
                        {{$faculty->id}}
                    </td>
                    <td>
                        {{$faculty->name}}
                    </td>
                    <td>
                        {{$faculty->city}}
                    </td>
                    <td>
                        {{$faculty->country}}
                    </td>
                    <td>
                        @if($faculty->description == null)
                            ///
                        @else
                            {{$faculty->description}}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</x-app-layout>
