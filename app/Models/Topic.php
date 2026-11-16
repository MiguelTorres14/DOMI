<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;

    protected $fillable = ['unit_id', 'name', 'order', 'points_reward'];
    public function unit() { return $this->belongsTo(Unit::class); }
    public function questions() { return $this->hasMany(Question::class); }
    public function progress() { return $this->hasMany(TopicProgress::class); }
}