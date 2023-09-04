@extends('layouts.app') 

@section('content')

<form method="POST" action="{{ route('timetables.generate') }}">
    @csrf
    <table>
        @foreach ($positions as $position)
            <tr>
                <td>{{ $position->name }}</td>
                <td>
                    <select name="users[{{ $position->id }}]">
                        @foreach ($availableUsers as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        @endforeach
    </table>
    <button type="submit">Generate Timetable</button>
</form>

@endsection