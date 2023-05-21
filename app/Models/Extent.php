<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extent extends Model
{
    // Define the table associated with the model
    protected $table = 'extents';

    // Define the fillable attributes
    protected $fillable = ['nev'];

    // Define any relationships with other models
    // For example, if Extent has many Restrictions:
    public function restrictions()
    {
        return $this->hasMany(Restriction::class, 'extentid');
    }
}
