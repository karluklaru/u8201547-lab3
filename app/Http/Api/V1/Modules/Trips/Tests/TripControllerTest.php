<?php

use Tests\TestCase;
use App\Domain\Trips\Models\Trip;
use function PHPUnit\Framework\assertEquals;

uses(TestCase::class);

test('GET /api/v1/trips 200', function () {
    $trip = Trip::factory()->count(5)->create();
    $this->get('/api/v1/trips/'.$trip->id)
        ->assertStatus(200)
        ->assertJsonCount(5, 'data');
});

test('GET /api/v1/trips/{id} 200', function () {
    $trip = Trip::factory()->create();
    $this->get('/api/v1/trips/'.$trip->id)
        ->assertStatus(200)
        ->assertJsonPath('data.id', $trip->id);
});

test('GET /api/v1/trip/{id} 404', function () {
    $trip = Trip::factory()->create();
    $this->get('/api/v1/trip/'.$trip->id+1)
        ->assertStatus(404);
});

test ('POST /api/v1/trips 200', function () {
    $request = [
        'departure_date' => '23.04.2023',
        'train_id' => '4',
        'ticket_count' => '80',
        'ticket_price' => '1200',
    ];

    $temp = $this->post('/api/v1/trips', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.departure_date', '23.04.2023');

});

test('DELETE /api/v1/trips/{id} 200', function () {
    $trip = Trip::factory()->create();
    $id = $trip->id;
    $this->delete('/api/v1/trips/'.$id)
        ->assertStatus(200);
    $result = Trip::query()->find($id);
    assertEquals(null, $result);
});

test('PATCH all fields /api/v1/trips/{id} 200', function () {
    $trip = Trip::factory()->create();
    $request = [
        'departure_date' => '23.04.2023',
        'train_id' => '4',
        'ticket_count' => '80',
        'ticket_price' => '1200',
    ];

    $this->patch('/api/v1/trips/'.$trip->id, $request)
        ->assertStatus(200)
        ->assertJsonPath('data.id', $trip->id);
});

test('PATCH /api/v1/trips/{id} 404', function () {
    $trip = Trip::factory()->create();
    $request = [
        'departure_date' => '23.04.2023',
        'train_id' => '4',
        'ticket_count' => '80',
        'ticket_price' => '1200',
    ];
    $this->patch('/api/v1/trips/'.$trip->id+1, $request)
        ->assertStatus(404);
});