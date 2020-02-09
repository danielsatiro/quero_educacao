<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Talk;

class TalkTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAssertTalkMinutes()
    {
        $talk1 = new Talk('Writing Fast Tests Against Enterprise Rails 60min');
        $talk2 = new Talk('Rails for Python Developers lightning');
        $talk3 = new Talk('Rails for Python Developers');

        $this->assertEquals(60, $talk1->minutes);
        $this->assertIsNumeric($talk1->minutes);
        $this->assertEquals(5, $talk2->minutes);
        $this->assertIsNumeric($talk2->minutes);
        $this->assertEquals(0, $talk3->minutes);
        $this->assertIsNumeric($talk3->minutes);
    }

    public function testGetMissingAttribute()
    {
        $talk = new Talk('Rails for Python Developers');

        $this->assertNull($talk->minute);
    }
}
