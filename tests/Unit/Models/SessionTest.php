<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class SessionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAttributIsSetted()
    {
        $session = new Session(10, 60);

        $this->assertInstanceOf(Collection::class, $session->talks);
        $this->assertInstanceOf(Carbon::class, $session->sessionStart);
        $this->assertEquals(60, $session->sessionMinutes);
    }

    public function testInvalidTalkInCollection()
    {
        $this->expectException(\InvalidArgumentException::class);

        $session = new Session(10, 160);

        $talks = collect([1, 2, 3]);
        $session->organizeSession($talks);
    }
}
