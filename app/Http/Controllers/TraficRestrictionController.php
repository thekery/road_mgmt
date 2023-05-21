<?php

namespace App\Http\Controllers;

use App\Models\Restriction;
use App\Models\Naming;
use App\Models\Extent;
use Illuminate\Http\Request;

class TraficRestrictionController extends Controller
{
    public function index()
    {
        $restrictions = Restriction::paginate(25);
        $namings = Naming::all();
        $extents = Extent::all();

        return view('traficrestriction', compact('restrictions', 'namings', 'extents'));
    }
}
