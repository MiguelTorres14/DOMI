<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    // Agregamos 'school_id' y 'semester' a la lista permitida
    protected $fillable = [
        'name', 
        'description', 
        'image_path', 
        'school_id', // <-- NUEVO
        'semester'   // <-- NUEVO
    ];

    public function units() { return $this->hasMany(Unit::class); }
    public function progress() { return $this->hasMany(SubjectProgress::class); }
    
    public function school() {
        return $this->belongsTo(School::class);
    }
}