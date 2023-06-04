<?php

use Tests\TestCase;
use App\Domain\Trains\Models\Train;
use function PHPUnit\Framework\assertEquals;

uses(TestCase::class);

test('GET /api/v1/trains 200', function () {
    $train = Train::factory()->count(5)->create();
    $this->get('/api/v1/trains/'.$train->id)
        ->assertStatus(200)
        ->assertJsonCount(5, 'data');
});

test('GET /api/v1/trains/{id} 200', function () {
    $train = Train::factory()->create();
    $this->get('/api/v1/trains/'.$train->id)
        ->assertStatus(200)
        ->assertJsonPath('data.id', $train->id);
});

test('GET /api/v1/trains/{id} 404', function () {
    $train = Train::factory()->create();
    $this->get('/api/v1/trains/'.$train->id+1)
        ->assertStatus(404);
});

test ('POST /api/v1/trains 200', function () {
    $request = [
        'departure_station' => 'Воронеж',
        'arrival_station' => 'Москва',
        'departure_time' => '9:40',
        'arrival_time' => '23:50',
        'cars_number' => '9',
    ];

    $temp = $this->post('/api/v1/trains', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.departure_station', 'Воронеж');

});

test('DELETE /api/v1/trains/{id} 200', function () {
    $train = Train::factory()->create();
    $id = $train->id;
    $this->delete('/api/v1/trains/'.$id)
        ->assertStatus(200);
    $result = Train::query()->find($id);
    assertEquals(null, $result);
});

test('PATCH all fields /api/v1/trains/{id} 200', function () {
    $train = Train::factory()->create();
    $request = [
        'departure_station' => 'Воронеж',
        'arrival_station' => 'Москва',
        'departure_time' => '9:40',
        'arrival_time' => '23:50',
        'cars_number' => '9',
    ];

    $this->patch('/api/v1/trains/'.$train->id, $request)
        ->assertStatus(200)
        ->assertJsonPath('data.id', $train->id);
});

test('PATCH /api/v1/trains/{id} 404', function () {
    $train = Train::factory()->create();
    $request = [
        'departure_station' => 'Воронеж',
        'arrival_station' => 'Москва',
        'departure_time' => '9:40',
        'arrival_time' => '23:50',
        'cars_number' => '9',
    ];
    $this->patch('/api/v1/trains/'.$train->id+1, $request)
        ->assertStatus(404);
});