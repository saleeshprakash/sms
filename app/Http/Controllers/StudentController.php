<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\StudentRepositoryInterface;
use App\Interfaces\TeacherRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Session;
use Throwable;

class StudentController extends Controller
{
    private StudentRepositoryInterface $orderRepository;

    public function __construct(
        StudentRepositoryInterface $studentRepository,
        TeacherRepositoryInterface $teacherRepository
    ) {
        $this->studentRepository = $studentRepository;
        $this->teacherRepository = $teacherRepository;
    }
    public function index(Request $request)
    {
        $classes = $this->studentRepository->getAllClasses();
        $teachers = $this->teacherRepository->getAllTeachers();
        $students = $this->studentRepository->getAllStudents();

        return view('students.list')->with(['teachers' => $teachers, 'classes' => $classes, 'students' => $students]);
    }

    public function register(Request $request)
    {
        try {
            $inserted = $this->studentRepository->registerStudent($request->all());
            if ($inserted) {
                Session::flash('success', 'New student is added successfully!');
                return response()->json(['status' => true, 'message' => 'New student is added successfully!']);
            } else {
                throw new Exception('Could not add new student');
            }
        } catch (Throwable $e) {
            return response()->json(['status' => false, 'message' => 'Could not add new student', 'error' => $e->getMessage()]);
        }
    }

    public function delete(Request $request)
    {
        try {
            $deleted = $this->studentRepository->deleteStudent($request->id);
            if ($deleted) {
                Session::flash('success', 'Student is deleted successfully!');
                return response()->json(['status' => true, 'message' => 'Student is deleted successfully!']);
            } else {
                throw new Exception('Could not delete student');
            }
        } catch (Throwable $e) {
            return response()->json(['status' => false, 'message' => 'Could not delete student', 'error' => $e->getMessage()]);
        }
    }

    public function details(Request $request)
    {
        try {
            $details = $this->studentRepository->getStudentDetails($request->id);
            if ($details) {
                return response()->json(['status' => true, 'data' => $details]);
            } else {
                throw new Exception('Could not get student details');
            }
        } catch (Throwable $e) {
            return response()->json(['status' => false, 'message' => 'Could not get student details', 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $this->studentRepository->updateStudentDetails($request->all());
            Session::flash('success', 'User details updated!');
            return response()->json(['status' => true, 'message' => 'User details updated']);
        } catch (Throwable $e) {
            return response()->json(['status' => false, 'message' => 'Could not get student details', 'error' => $e->getMessage()]);
        }
    }
}
