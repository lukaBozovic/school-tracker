<table>
    <thead>
    @php($style = 'background-color: #becdf3; border: 1px solid #CCC; text-align: center; font-weight: bold;')
    <tr>
        <td style="{{$style}}">Name</td>
        <td style="{{$style}}">ECTS</td>
        <td style="{{$style}}">Semester</td>
        <td style="{{$style}}">Total points</td>
        <td style="{{$style}}">Mark</td>
    </tr>

    </thead>
    <tbody>
    @foreach($courses as $courses)
        @php($totalPoints = $courses->courseStudents->first()?->totalPoints ?? number_format(0, 2))
        <tr>
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
        </tr>
    @endforeach
    </tbody>
</table>
