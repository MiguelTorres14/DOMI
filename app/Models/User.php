<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon; // <-- NUEVO: Para el cálculo de fechas

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', 
        'points', 
        'streak', 
        'hearts', 
        'last_activity_date',
        'school_id', 
        'semester',
        'enrollment_date' // <-- NUEVO: Para calcular el semestre
    ];

    protected $hidden = ['password', 'remember_token'];
    
    protected $casts = [
        'email_verified_at' => 'datetime', 
        'password' => 'hashed',
        'enrollment_date' => 'date', // <-- NUEVO: Casteamos a fecha
    ];

    /**
     * MAGIA: Calcula el semestre automáticamente basado en la fecha de ingreso.
     */
    public function getSemesterAttribute($value)
    {
        // Si es admin, no calculamos, le dejamos el valor de la BD
        if ($this->role === 'admin') {
            return $value;
        }

        // Si no tiene fecha de ingreso, devolvemos el valor de la BD
        if (!$this->enrollment_date) {
            return $value; 
        }

        // Calculamos cuántos meses han pasado desde su ingreso
        $start = Carbon::parse($this->enrollment_date);
        $now = Carbon::now();
        $monthsPassed = $start->diffInMonths($now);

        // 1 semestre = 6 meses. Si pasaron 7 meses, está en 2do semestre.
        $calculatedSemester = floor($monthsPassed / 6) + 1;

        // Evitamos que pase del semestre 12
        return min($calculatedSemester, 12);
    }

    public function topicProgress() { return $this->hasMany(TopicProgress::class); }
    public function subjectProgress() { return $this->hasMany(SubjectProgress::class); }
    public function attempts() { return $this->hasMany(Attempt::class); }
    public function rewards() { return $this->belongsToMany(Reward::class)->withTimestamps(); }
    public function chatMessages() { return $this->hasMany(ChatMessage::class); }
    
    public function school() {
        return $this->belongsTo(School::class);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailNotification);
    }
}