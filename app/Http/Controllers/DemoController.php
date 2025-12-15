<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Student;

class DemoController extends Controller
{
    /**
     * 1-1 Relationship: User + Profile
     */
    public function showUser($id)
    {
        // Mengambil user beserta profile-nya
        $user = User::with('profile')->findOrFail($id);
        
        return view('demo.user', compact('user'));
    }

    /**
     * 1-N Relationship: Post + Comments (dengan User penulis komentar)
     */
    public function showPost($id)
    {
        // Eager loading: ambil post, komentar, dan siapa yang berkomentar
        $post = Post::with('comments.user')->findOrFail($id);
        
        return view('demo.post', compact('post'));
    }

    /**
     * N-N Relationship: Student + Courses
     */
    public function showStudent($id)
    {
        // Mengambil mahasiswa beserta mata kuliah yang diambil
        $student = Student::with('courses')->findOrFail($id);
        
        return view('demo.student', compact('student'));
    }

    /**
     * Menambahkan Course ke Student (Attach)
     * Form POST
     */
    public function attachCourse(Request $request, $studentId)
    {
        $student = Student::findOrFail($studentId);
        
        // Validasi input agar tidak error jika course_id kosong
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Attach: Menambahkan hubungan baru (bisa duplikat jika tidak dicek)
        // Gunakan sync() jika ingin me-replace semua data lama dengan yang baru
        $student->courses()->attach($request->course_id); 
        
        return back()->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    /**
     * Menghapus Course dari Student (Detach)
     */
    public function detachCourse($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        
        // Detach: Melepaskan hubungan spesifik
        $student->courses()->detach($courseId);
        
        // Hapus huruf 'r' typo yang ada di kode lama
        return back()->with('success', 'Mata kuliah berhasil dilepas!'); 
    }
}