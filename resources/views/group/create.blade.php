@extends('layouts.app')
@section('title', 'Создать группу')
@section('content')
    {{ Form::model($group, ['url' => route('groups.store')]) }}
        @include('group.form')
        {{ Form::submit('Сохранить') }}
    {{ Form::close() }}
@endsection