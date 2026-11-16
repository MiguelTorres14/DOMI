<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatMessage extends Model
{
    use SoftDeletes;    

    protected $fillable = ['user_id', 'role', 'message'];
    public function user() { return $this->belongsTo(User::class); }
}