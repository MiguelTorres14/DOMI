<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = ['topic_id', 'question_text'];
    public function topic() { return $this->belongsTo(Topic::class); }
    public function options() { return $this->hasMany(Option::class); }
}