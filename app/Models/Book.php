<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Book extends Model 
{
    protected $fillable = ['name', 'description', 'price', 'image', 'author_id', 'student_id'];  
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }



}
