<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrument;
use App\Models\Tag;

class InstrumentController extends Controller
{
    public function index(Instrument $instrument,Tag $tag)
        {
            return view('instruments.index')->with(['posts' => $instrument->getByInstrument(),'tags' => $tag->get(),'instruments' => $instrument->get()]);
        }
}