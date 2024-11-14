<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Define the table name
    protected $table = 'students';

    // Define the primary key if it's not the default 'id'
    protected $primaryKey = 'StudentID'; // Assuming StudentID is the primary key

    // Set the type of the primary key if it's not an auto-incrementing integer (e.g., UUID)
    public $incrementing = true;  // Assuming auto-increment is used for StudentID

    // Define the fields that are mass assignable
    protected $fillable = [
        'Name',
        'DateOfBirth',
        'Gender',
        'ContactNumber',
        'EmailAddress',
        'Semester1GPA',
        'Semester2GPA',
        'Semester3GPA',
        'Semester4GPA',
        'FinalCGPA',
    ];
}
