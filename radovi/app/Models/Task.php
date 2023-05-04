<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'professor_id',
        'student_id',
        'title',
        'study_type'
    ];

    public function professor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'professor_id', 'id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function submissions(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'submissions', 'task_id', 'student_id')->withTimestamps()->using(Submission::class);
    }
}
