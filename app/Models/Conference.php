<?php

namespace App\Models;

use App\Models\Talk;

/**
 * Class Conference
 *
 * @package App\Models
 *
 * @author  Daniel Satiro <danielsatiro2003@yahoo.com.br>
 * @OA\Schema(
 *     title="Conference model",
 *     description="Conference model",
 * )
 */
class Conference
{
    use GetAttributes;

    /**
     * @OA\Property(
     *     title="Talk title",
     *     description="Talk title",
     *     @OA\Schema(
     *         type="array",
     *         @OA\Items(type="string")
     *     ),
     *     @OA\Items(type="string")
     * )
     *
     * @var array
     */
    private $data;
    private $tracks;
    private $talks;

    public function __construct(array $talks)
    {
        $this->tracks = [];

        $this->talks = collect();
        $this->data = $talks['data'];

        foreach ($this->data as $value) {
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
