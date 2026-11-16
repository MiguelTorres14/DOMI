<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attempt extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'topic_id', 'score', 'points_earned', 'passed'];
    public function user() { return $this->belongsTo(User::class); }
    public function topic() { return $this->belongsTo(Topic::class); }
}