<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /*
    protected $fillable = [
        'employee_id', 'salary', 'effective_date',
    ];
    */

    // Aquí podrías definir relaciones con otros modelos si es necesario.
}
