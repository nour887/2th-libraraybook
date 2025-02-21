<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Author;
use App\Models\Book; 
class StudentController extends Controller
{
    public function create()
    {
        $authors = Author::all(); // 1. تصحيح اسم المودل بحرف كبير
        $books = Book::all();
      return view('students.create', [
        'authors' => $authors,
        'books' => $books  ]);
        }
    public function store(Request $request)
    {
    // التحقق من صحة البيانات
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string',
        'phone' => 'required|string',
        'book_id' => 'required|exists:books,id',
        'author_id' => 'required|exists:authors,id'

    ]);
        // حفظ البيانات في قاعدة البيانات
         Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'book_id' => $request->book_id ,
            'author_id' => $request->author_id ,
             ]);
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function index() {
        $students = Student::all(); 
        return view('students.index', compact('students')); 
    }
    public function update($id)
    {
        $student = Student::findOrFail($id);
        $authors = Author::all();
        $books = Book::all();
        return view('students.update' , compact('student', 'books', 'authors' ));
}
public function execute(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email',
        'phone' => 'required|string',
        'book_id' => 'required|exists:books,id',
        'author_id' => 'required|exists:authors,id'
    ]);

    $student = Student::findOrFail($id); // البحث عن الطالب، وإذا لم يكن موجودًا يرمي خطأ

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'book_id' => $request->book_id,
        'author_id' => $request->author_id,
    ]);

    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
}
public function delete($id)
{
    try {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Students deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting book: ' . $e->getMessage());
    }}
    public function show($id)
    {
        $student = Student::with(['book', 'author'])->findOrFail($id);
        return view('students.show', compact('student'));
    }
    

}
