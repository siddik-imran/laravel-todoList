<?php

namespace App;
use App\Step;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'completed', 'user_id', 'description'];

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}
