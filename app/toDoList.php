<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toDoList extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'to_do_lists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name', 'description', 'complete',
    ];
}
