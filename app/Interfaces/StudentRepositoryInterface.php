<?php

namespace App\Interfaces;

interface StudentRepositoryInterface 
{
    public function getAllStudents();
    public function getAllClasses();
    public function registerStudent($data);
    public function deleteStudent($id);
    public function getStudentDetails($id);
    public function updateStudentDetails($data);
}