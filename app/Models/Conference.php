<?php

namespace App\Models;

use App\Models\Talk;

class Conference
{
    use GetAttributes;

    private $tracks;
    private $talks;

    public function __construct(array $talks)
    {
        $this->tracks = [];

        $this->talks = collect();

        foreach ($talks as $value) {
            $this->talks->add(new Talk($value));
        }
    }

    public function addTrack(Track $track) : void
    {
        $this->tracks[] = $track;
    }

    public function organizeTracks()
    {
        $i = 0;
        while ($this->talks->isNotEmpty()) {
            $track = new Track(++$i);
            $track->organizeSessions($this->talks);

            $this->addTrack($track);
        }
    }
}
