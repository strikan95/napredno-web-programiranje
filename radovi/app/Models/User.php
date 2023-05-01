<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'name',
        'email',
        'password',
        'approved_at',
        'type'
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

        if($this->hasRole('admin'))     return 'admin.dashboard';
        if($this->hasRole('student'))   return 'student.dashboard';
        if($this->hasRole('professor')) return 'professor.dashboard';

        return 'user.approval';
    }

    public function approve(): void
    {
        $this->approved_at = now();
    }

    public function isApproved(): bool
    {
        return $this->approved_at !== null;
    }

    // define connection with roles table
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

// check if user has that $role
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
}
