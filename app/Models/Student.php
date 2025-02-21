<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email','phone','book_id','author_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id'); 
    }

    // علاقة الطالب بالمؤلف
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
 

}
