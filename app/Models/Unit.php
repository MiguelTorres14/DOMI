<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $fillable = ['subject_id', 'name', 'order'];
    public function subject() { return $this->belongsTo(Subject::class); }
    public function topics() { return $this->hasMany(Topic::class); }
}