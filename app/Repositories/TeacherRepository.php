<?php

namespace App\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\User;

class TeacherRepository implements TeacherRepositoryInterface 
{
    public function getAllTeachers()
    {
        return User::where('role','teacher')->get();
    }
}