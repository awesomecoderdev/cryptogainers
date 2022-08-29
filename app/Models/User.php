<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     *INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `isAdmin`, `isSupperAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'MD IBRAHIM KHOLIL', 'awesomecoder.org@gmail.com', '2022-03-23 18:44:38', '$2y$10$leeDFmr.yxMuU2U2SQOs7OJIlGj6jSM9s6LbQTSjpb3Vv/jS9Drfe', '1', '1', 'GshcfuPKVwc6SKLtHtRYZbXc3UhCy2FZUnLz0o9yxUFnJLQ4DSP7Fmagvdy9', '2022-03-23 18:43:54', '2022-03-23 18:44:38');
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
