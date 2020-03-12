{{ Form::model($student, ['url' => route('students.update', $student), 'method' => 'PATCH']) }}
    @include('student.form')
    {{ Form::submit('Обновить') }}
{{ Form::close() }}