 @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

Имя: {{ Form::text('name') }}<br>
Фамилия: {{ Form::text('lastName') }}<br>
Отчество: {{ Form::text('patronymic') }}<br>
Группа: {{ Form::select('groupNum', $groups) }}<br>