<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restriction extends Model
{
    // Define the table associated with the model
    protected $table = 'restrictions';

    // Define the fillable attributes
    protected $fillable = ['roadnumber', 'frompoint', 'topoint', 'settlement', 'fromdate', 'todate', 'namingid', 'extentid', 'speed'];

    // Define any relationships with other models
    // For example, if Restriction belongs to a Naming model:
    public function naming()
    {
        return $this->belongsTo(Naming::class, 'namingid');
    }

    // If Restriction belongs to an Extent model:
    public function extent()
    {
        return $this->belongsTo(Extent::class, 'extentid');
    }
}
