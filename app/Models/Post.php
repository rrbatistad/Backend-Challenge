<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'rating'
    ];
    protected $hidden = [
        'created_at', 
        'updated_at'
    ];

    /*
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // Relación de Muchos a Uno
	public function user(){
		return $this->belongsTo(User::class, 'user_id');
	}
    
}
