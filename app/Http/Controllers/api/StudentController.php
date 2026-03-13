<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with(['user', 'class'])->get();

        return response()->json($students);
    }


    public function show($id)
    {
        $student = Student::with(['user', 'class'])->find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student tidak ditemukan'
            ], 404);
        }

        return response()->json($student);
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'class_id' => 'required',
            'nis' => 'required|unique:students',
            'gender' => 'required'
        ]);

        $student = Student::create([
            'id' => Str::uuid(),
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
            'nis' => $request->nis,
            'gender' => $request->gender,
        ]);

        return response()->json([
            'message' => 'Student berhasil dibuat',
            'data' => $student
        ]);
    }


    public function update(Request $request, $id)
    {

        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student tidak ditemukan'
            ], 404);
        }

        $student->update($request->all());

        return response()->json([
            'message' => 'Student berhasil diupdate',
            'data' => $student
        ]);
    }


    public function destroy($id)
    {

        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student tidak ditemukan'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'message' => 'Student berhasil dihapus'
        ]);
    }
}