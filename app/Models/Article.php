<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\AuthorizedScope;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_text', 'category_id', 'user_id', 'published_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }


    protected static function booted()
    {
        static::addGlobalScope(new AuthorizedScope);
    }


}
