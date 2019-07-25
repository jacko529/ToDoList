<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toDoList extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'to_do_lists';
    public $timestamps = false;
    protected $notFoundMessage = 'The to do list resource could be found';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name', 'description', 'complete',
    ];

    /**
     * The attributes that are hidden for the resource
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];
}
