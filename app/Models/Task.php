<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'team_id',
        'desc',
        'date',
        'done',
        
        
    ];

    public function getAll() {
        return $this->all();
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
