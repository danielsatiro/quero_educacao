<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Http\Resources\ConferenceResource;

class ConferenceController extends Controller
{

    public function __construct()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->headers->set('Accept', 'application/json');
        $request->validate([
            'data' => ['required', 'array'],
            'data.*' => ['required', 'string', new \App\Rules\TalkTitle],
        ]);

        $talks = $request->all();

        $conference = new Conference($talks['data']);
        $conference->organizeTracks();

        return (ConferenceResource::collection($conference->tracks))
                ->response();
    }
}
