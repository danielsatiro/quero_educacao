<?php

namespace Tests\Feature;

use Generator;
use Tests\TestCase;

class ConferenceTest extends TestCase
{
    /**
     * @dataProvider getDataTalks
     * @small
     */
    public function testPostTalks(array $data, int $statusCode, array $responseTest)
    {
        $response = $this->postJson('/api/conferences/talks', $data);

        $response->assertStatus($statusCode)
                ->assertExactJson($responseTest);
    }

    public function getDataTalks(): Generator
    {
        yield from $this->getData('valid_conference');
        yield from $this->getData('invalid_conference');
    }

    private function getData(string $file): array
    {
        $data = json_decode(file_get_contents(__DIR__ . "/data/{$file}.json"), true);

        return [
            "data/{$file}.json" => [
                'data' => $data['request']['body'],
                'statusCode' => $data['response']['statusCode'],
                'responseBody' => $data['response']['body'],
            ],
        ];
    }
}
