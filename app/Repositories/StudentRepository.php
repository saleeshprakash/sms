<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Classes;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function getAllStudents()
    {
        return Student::with(['class', 'teacher'])->paginate(15);
    }

    public function getAllClasses()
    {
        return Classes::all();
    }

    public function registerStudent($data)
    {
        return Student::insert([
            'name' => $data['name'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'class_id' => $data['class'],
            'reporting_teacher_id' => $data['reporting_teacher'],
            'created_at' => now()
        ]);
    }

    public function deleteStudent($id)
    {
        return Student::where('id', $id)->delete();
    }

    public function getStudentDetails($id)
    {
        return Student::where('id', $id)->first();
    }

    public function updateStudentDetails($data)
    {
        return Student::where('id', $data['id'])->update([
            'name' => $data['name'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'class_id' => $data['class'],
            'reporting_teacher_id' => $data['reporting_teacher'],
            'updated_at' => now()
        ]);
    }
}
