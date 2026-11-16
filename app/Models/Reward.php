<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'cost_points', 'stock', 'type'];
    public function users() { return $this->belongsToMany(User::class)->withTimestamps(); }
}