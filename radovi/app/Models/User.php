<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Util\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'study_type',
        'email',
        'password',
        'approved_at',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRedirectRoute()
    {

        if($this->role == Roles::ROLE_ADMIN)     return 'admin.dashboard';
        if($this->role == Roles::ROLE_PROFESSOR) return 'professor.dashboard';
        if($this->role == Roles::ROLE_STUDENT)   return 'student.dashboard';

        return null;
    }

    public function approve(): void
    {
        $this->approved_at = now();
    }

    public function isApproved(): bool
    {
        return $this->approved_at !== null;
    }

    public function setRole(string $role)
    {
        $this->role = $role;
    }

    // check if user has that $role
    public function hasRole($role)
    {
        return $this->role == $role;
    }

    public function submitted(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'submissions', 'student_id', 'task_id')
            ->using(Submission::class)
            ->withTimestamps()
            ->withPivot('priority')
            ->orderBy('priority');
    }

    public function hasTask(): bool
    {
        return count(Task::query()->where('student_id', '=', $this->id)->get()) !== 0;
    }
}
