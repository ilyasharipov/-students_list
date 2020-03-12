@if (Session::has('status'))
	{{ Session::get('status') }}
@endif
@extends('layouts.app')
@section('title', 'Список групп')
@section('content')
    <h1>Список групп</h1>
    <table>
        <tr>
            <th>Номер группы</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($groups as $group)
        <tr>
            <td><a href="{{ route('groups.show', $group) }}">{{ $group->groupNum }}</a></td>
            <td></td>
            <td><a href="{{ route('groups.edit', $group) }}">Ред.</a></td>
            <td><a href="{{ route('groups.destroy', $group) }}" data-confirm="Вы уверены?" data-method="delete">Удал.</a></td>
        </tr>
    @endforeach
    </table> 
    {{ $groups->links() }}
@endsection