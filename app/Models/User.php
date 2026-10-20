<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'points', 'streak', 'hearts', 'last_activity_date'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public function topicProgress() { return $this->hasMany(TopicProgress::class); }
    public function subjectProgress() { return $this->hasMany(SubjectProgress::class); }
    public function attempts() { return $this->hasMany(Attempt::class); }
    public function rewards() { return $this->belongsToMany(Reward::class)->withTimestamps(); }
    public function chatMessages() { return $this->hasMany(ChatMessage::class); }
}