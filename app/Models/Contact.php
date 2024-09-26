<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cin','nom','sujet','telephone', 'birthdate','email', 'message', 'user_id','age',
    'group', 'designation', 'firstName',
    'lastName',
    'group_id', 'gender', 'naissance'];


  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}