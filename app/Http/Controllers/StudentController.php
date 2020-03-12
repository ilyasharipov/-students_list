<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentPost;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate();

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new Student();
        $groups = \App\Group::all()->pluck('groupNum', 'id')->toArray();

        print_r($groups);

        return view('student.create', compact('student', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentPost $request)
    {
        $validated = $request->validated();
        $student = new Student();
        // Заполнение статьи данными из формы
        $groupNum = $request->input('groupNum');
        $student->group()->associate($groupNum);
        $student->fill($request->all());
        // При ошибках сохранения возникнет исключение
        $student->save();

        // Редирект на указанный маршрут с добавлением флеш-сообщения
        $request->session()->flash('status', 'Create was successful!');
        return redirect()
            ->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $group = $student->group;
        return view('student.show', compact('student', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groups = \App\Group::all()->pluck('groupNum', 'id')->toArray();
        return view('student.edit', compact('student', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastName' => 'required',
            'patronymic' => 'required',
            'group_id' => 'required',
        ]);

        $groupNum = $request->input('groupNum');
        $student->group()->associate($groupNum);
        $student->fill($request->all());
        $student->save();
        $request->session()->flash('status', 'Update was successful!');
        return redirect()
            ->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // DELETE — идемпотентный метод, поэтому результат операции всегда один и тот же
        //$article = Article::find($id);
        if ($student) {
            $student->delete();
        }
        return redirect()->route('students.index');
    }
}
