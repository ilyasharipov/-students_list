@extends('layouts.app')
@section('title', 'Создать студента')
@section('content')
    {{ Form::model($student, ['url' => route('students.store')]) }}
        @include('student.form')
        {{ Form::submit('Сохранить') }}
    {{ Form::close() }}
@endsection