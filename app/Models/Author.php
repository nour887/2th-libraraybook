<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email','phone','book_id','student_id'
    ];
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
    public function students()
    {
        return $this->hasOne(Student::class, 'astudent_id');
    }
}