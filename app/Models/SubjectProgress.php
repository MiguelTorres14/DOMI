<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SubjectProgress extends Model
{
    protected $fillable = ['user_id', 'subject_id', 'percentage', 'is_completed'];
    public function user() { return $this->belongsTo(User::class); }
    public function subject() { return $this->belongsTo(Subject::class); }
}