<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAttachment extends Model
{
    /** @use HasFactory<\Database\Factories\TaskAttachmentFactory> */
    use HasFactory;

    protected $fillable = [
        'task_id',
        'file_path',
        'file_name',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
