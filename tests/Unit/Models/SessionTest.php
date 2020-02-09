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
}
