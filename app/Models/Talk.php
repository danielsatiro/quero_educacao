<?php

namespace App\Models;


class Talk
{
    use GetAttributes;
    
    private $title;
    private $minutes;

    const LIGHTNING_STR = 'lightning';
    const LIGHTNING_MIN = 5;

    public function __construct(string $title)
    {
        $this->title = trim($title);
        $this->minutes = $this->getTitleMinutes();
    }

    public function getTitleMinutes()
    {
        $matches = [];
        preg_match('/\d+(?!.*\d)|' . self::LIGHTNING_STR . '/', $this->title, $matches);

        $minute = reset($matches);

        if ($minute == self::LIGHTNING_STR) {
            return self::LIGHTNING_MIN;
        }

        return (int) $minute;
    }
}
