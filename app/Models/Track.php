<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;

class Track
{
    use GetAttributes;

    private $title;
    private $data;

    const FIRST_SESSION = 180;
    const FIRST_SESSION_START = 9;

    const SECOND_SESSION = 240;
    const SECOND_SESSION_START = 13;

    const LUNCH_START = 12;
    const NE_START = 17;

    public function __construct(int $n)
    {
        $this->title = "Track $n";
        $this->data = collect();
    }

    public function organizeSessions(Collection $talks) : void
    {
        $firstSession = new Session(self::FIRST_SESSION_START, self::FIRST_SESSION);
        $firstSession->organizeSession($talks);
        $this->data = $this->data->merge($firstSession->talks);
        $this->data->add($this->getBreakTime('Lunch', self::LUNCH_START));

        $secondSession = new Session(self::SECOND_SESSION_START, self::SECOND_SESSION);
        $secondSession->organizeSession($talks);
        $this->data = $this->data->merge($secondSession->talks->all());
        $this->data->add($this->getBreakTime('Networking Event', self::NE_START));
    }

    private function getBreakTime(string $name, int $start) : string
    {
        $breakTime = Carbon::now()->startOfDay()->addHours($start)->format('h:iA');
        return "{$breakTime} {$name}";
    }
}
