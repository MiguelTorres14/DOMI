<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'description', 'image_path'];
    public function units() { return $this->hasMany(Unit::class); }
    public function progress() { return $this->hasMany(SubjectProgress::class); }
}