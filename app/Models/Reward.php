<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['name', 'description', 'cost_points', 'stock', 'type'];
    public function users() { return $this->belongsToMany(User::class)->withTimestamps(); }
}