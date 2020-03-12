{{ Form::model($group, ['url' => route('groups.update', $group), 'method' => 'PATCH']) }}
    @include('group.form')
    {{ Form::submit('Обновить') }}
{{ Form::close() }}