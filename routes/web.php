<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\StudentController;



Route::get('/', function () {
    return view('welcome');
});

                                        // book 
// create book 
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

//  TABLE book
Route::get('/books/index', [BookController::class, 'index'])->name('books.index');

// update book
Route::post('/books/update/{id}', [BookController::class, 'execute'])->name('books.update');
Route::get('/books/update/{id}', [BookController::class, 'update']);

// delete book
Route::get('/books/delete/{id}', [BookController::class, 'delete']);

// show book
Route::get('books/show/{id}', [BookController::class, 'show'])->name('books.show');
// create Author 
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

//  show Author
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

// update Author
// عرض نموذج التحديث
Route::get('/authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::post('/authors/update/{id}', [AuthorController::class, 'execute'])->name('authors.execute');

// delete Author
Route::get('/authors/delete/{id}', [AuthorController::class, 'delete']);
Route::get('/authors/show/{id}', [AuthorController::class, 'show'])->name('authors.update');

                                // create Student 
                
// create Student 
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

//  show Student
Route::get('/students/index', [StudentController::class, 'index'])->name('students.index');

// update Student
Route::post('/students/update/{id}', [StudentController::class, 'execute'])->name('students.update');
Route::get('/students/update/{id}', [StudentController::class, 'update']);

// delete Student
Route::get('/students/delete/{id}', [StudentController::class, 'delete']);
Route::get('/students/show/{id}', [StudentController::class, 'show'])->name('show.update');
