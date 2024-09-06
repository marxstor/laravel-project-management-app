<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'proj_name',
        'proj_desc',
        'proj_status',
        'proj_deadline',
        'created_by',
    ];

    // define the relationship of task method on the project model
    // get the tasks associated to the project
    public function tasks() {
        return $this->hasMany(Task::class, 'project_id');
    }

    // the second parameter to the belongsTo mothod is the name of the foreign key
    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedUser() {
        return $this->belongsTo(User::class, 'assigned_user');
    }
}
