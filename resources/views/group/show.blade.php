@extends('layouts.app')
@section('title', 'группа')
@section('content')
    <div>Список студентов группы {{ $group->groupNum }}:</div>
    <div>
          <ol>
              @foreach ($students as $student)
                  <li>{{ $student->lastName }} {{ $student->name }} {{ $student->patronymic }}</li>
              @endforeach
          </ol>
      </div>
@endsection