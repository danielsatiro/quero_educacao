<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;

class Session
{
    use GetAttributes;

    private $talks;
    private $sessionStart;
    private $sessionMinutes;

    public function __construct(int $sessionStart, int $sessionMinutes)
    {
        $this->talks = collect();
        $this->sessionStart = Carbon::now()->startOfDay()->addHours($sessionStart);
        $this->sessionMinutes = $sessionMinutes;
    }

    public function organizeSession(Collection $talks) : void
    {
        $forgets = [];
        $startTalk = clone $this->sessionStart;
        foreach ($talks as $key => $talk) {
            if (!$talk instanceof Talk) {
                throw new \InvalidArgumentException('Invalid Talk');
            }
            if ($talk->minutes > $this->sessionMinutes) {
                continue;
            }
            $forgets[] = $key;

            $this->talks->add("{$startTalk->format('h:iA')} {$talk->title}");

            $startTalk->addMinutes($talk->minutes);
            $this->sessionMinutes -= $talk->minutes;
        }

        $talks->forget($forgets);
    }
}
