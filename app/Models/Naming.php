<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Naming extends Model
{
    // Define the table associated with the model
    protected $table = 'namings';

    // Define the fillable attributes
    protected $fillable = ['nev'];

    // Define any relationships with other models
    // For example, if Naming has many Restrictions:
    public function restrictions()
    {
        return $this->hasMany(Restriction::class, 'namingid');
    }
}
