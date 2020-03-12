@if (Session::has('status'))
	{{ Session::get('status') }}
@endif
@extends('layouts.app')
@section('title', 'Список студентов')
@section('content')
    <h1>Список студентов</h1>
    <table>
        <tr>
            <th>ФИО</th>
            <th>Группа</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($students as $student)
        <tr>
            <td><a href="{{ route('students.show', $student) }}">{{ $student->lastName }} {{ $student->name }} {{ $student->patronymic }}</a></td>
            <td><a href="{{ route('students.edit', $student) }}">Ред.</a></td>
            <td><a href="{{ route('students.destroy', $student) }}" data-confirm="Вы уверены?" data-method="delete">Удал.</a></td>
            <td></td>
        </tr>
    @endforeach
    </table> 
    {{ $students->links() }}
@endsection