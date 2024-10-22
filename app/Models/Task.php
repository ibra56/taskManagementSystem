<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priorities_id',
        'category_id',
        'user_id',
        'deadline'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function priorities()
    {
        return $this->belongsTo(Priorities::class);
    }
    public function attachments()
    {
        return $this->hasMany(TaskAttachment::class);
    }
}
