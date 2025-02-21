<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Student;

use App\Models\Book;
class BookController extends Controller
{
    public function create(){
    
    $authors = Author::all(); // 1. تصحيح اسم المودل بحرف كبير
    $students = Student::all();
    return view('books.create',[
        'authors' => $authors,
        'students' => $students
    ]);
}
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'string|required',
            'description' => 'string|required',
            'price'       => 'numeric|required|min:0',
            'image'       => 'image|mimes:jpeg,png,jpg,gif',
            'author_id' => 'required|exists:authors,id',
            'student_id' => 'required|exists:students,id',

        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'book_' . time() . '.' . $image->getClientOriginalExtension();
            // حفظ الصورة في storage/app/public/uploads/books
            $path = $image->storeAs('uploads/books', $filename, 'public');
            $imagePath = $path; // بدون إضافة 'storage/' هنا
        }
        Book::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $imagePath,
            'author_id' => $request->author_id ,
            'student_id' => $request->student_id ,
        ]);
    
        return redirect()->route('books.index')->with('success', 'Book created successfully!');
   
    }
public function index() {
    $books = Book::all();         
    return view('books.index', compact('books'));
}
public function update($id)
{
    $book = Book::findOrFail($id);
    $authors = Author::all();
    $students = Student::all();
    return view('books.update', compact('book', 'authors', 'students'));
}

public function execute(Request $request, $id)
{
    $validated = $request->validate([
        'name'        => 'required|string',
        'description' => 'required|string',
        'price'       => 'required|numeric|min:0',
        'image'       => 'image|mimes:jpeg,png,jpg,gif|required',
        'author_id'   => 'required|exists:authors,id',
        'student_id'  => 'required|exists:students,id',
    ]);

    $book = Book::findOrFail($id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = 'book_' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('uploads/books', $filename, 'public');
        $validated['image'] = $path;
    } else {
        $validated['image'] = $book->image; // الاحتفاظ بالصورة القديمة
    }

    $book->update($validated);
    return redirect()->route('books.index')->with('success', 'Book updated successfully!');
}
public function delete($id)
{
    try {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting book: ' . $e->getMessage());
    }
}
public function show($id)
{
    $book = Book::with(['author', 'student'])->findOrFail($id);
    return view('books.show', compact('book'));
}

}





    

