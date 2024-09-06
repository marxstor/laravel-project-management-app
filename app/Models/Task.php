<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'project_id',
        'task_name',
        'task_status',
        'created_by',
        'assigned_user',
        'task_due'
    ];

    public function projects() {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function taskCreator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedUser() {
        return $this->belongsTo(User::class, 'assigned_user');
    }
}
