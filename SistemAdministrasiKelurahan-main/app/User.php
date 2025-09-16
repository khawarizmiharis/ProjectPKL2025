<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik',
        'full_name',
        'email',
        'password',
        'phone',
        'photo',
        'is_active',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'last_login' => 'datetime',
    ];

    // -----------------------
    // RELATIONS
    // -----------------------

    public function letterSubmissions()
    {
        return $this->hasMany(LetterSubmission::class);
    }

    public function villager()
    {
        return $this->hasOne(Villager::class);
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function complaintComments()
    {
        return $this->hasMany(ComplaintComment::class);
    }

    public function umkmProfile()
    {
        return $this->hasOne(UmkmProfile::class);
    }

    // -----------------------
    // ACCESSORS / HELPERS
    // -----------------------

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function getNameWithNikAttribute()
    {
        return "{$this->full_name} ({$this->nik})";
    }
}