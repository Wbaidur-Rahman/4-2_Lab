<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primary_key = 'id';
    protected $fillable = ['title', 'author', 'isbn', 'pages'];
    use HasFactory;
}
