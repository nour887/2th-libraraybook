<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book; 
class AuthorController extends Controller
{
    public function create()
{
    $books = Book::all();
    $authors = Author::all(); 
    return view('authors.create',[
        'books' => $books,
        'authors' => $authors
    ]);
}
    public function store(Request $request)
    {
    // التحقق من صحة البيانات
    $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name'  => 'required|string',
        'email'      => 'required|string',
        'phone'      => 'required|string',
        'book_id'   => 'required|exists:books,id',
    ]);
   
        // حفظ البيانات في قاعدة البيانات
            Author::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'book_id'    => $request->book_id   
           ]);

        return redirect()->route('authors.index')->with('success', 'Author created successfully!');
        }  


        public function index() {
            $authors = Author::with('book')->get(); 
            return view('authors.index', compact('authors')); 
        }
        public function update($id)
        {
            $author = Author::findOrFail($id);
            $books = Book::all(); 
            return view('authors.update', compact('author', 'books'));
        }
public function execute(Request $request, $id)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string',
        'email'      => 'required|email',
        'phone'      => 'required|string',
        'book_id'    => 'required|exists:books,id', // تأكد من إضافة هذا الحقل إذا كان موجودًا
    ]);

    $author = Author::findOrFail($id);
    $author->update($validated);

    return redirect()->route('authors.index')->with('success', 'Author updated successfully!');
}


public function delete($id)
{
    try {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting book: ' . $e->getMessage());
    }}
    public function show($id)
{
    $author = Author::with(['book'])->findOrFail($id);
    return view('authors.show', compact('author'));
}
}
