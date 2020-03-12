@extends('layouts.app')
@section('title', 'студент')
@section('content')
    <div>Номер группы: {{ $group->groupNum }}</div>
    <div>{{ $student->lastName }} {{ $student->name }} {{ $student->patronymic }}</div>
@endsection