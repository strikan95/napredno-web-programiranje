<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_leader_id',
        'title',
        'description'
    ];

    public function leader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'project_leader_id', 'id');
    }

    public function collaborators(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'collaborations', 'project_id', 'user_id')->withTimestamps();
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'project_id');
    }
}
