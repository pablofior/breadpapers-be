<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 20/07/19
 * Time: 22:27
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Breadpaper extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function collaborators()
    {
        return $this->belongsToMany(
            User::class,
            'breadpaper_has_users',
            'user_id',
            'breadpaper_id'
        );
    }

    public function owner()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}