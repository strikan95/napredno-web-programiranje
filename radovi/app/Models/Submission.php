<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Submission extends Pivot
{
    use HasFactory;

    protected $table = 'submissions';

    protected $fillable = [
        'task_id',
        'student_id',
        'priority',
        'valid'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
