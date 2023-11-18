<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

test('users can retrieve their data', function () {
    $user = User::factory()->create();
    actingAs($user);

    $response = $this->get(Route('user-profile'))
    ->assertStatus(200);

    expect($jsonResponse = $response->getContent())->toBeJson();
    expect(json_decode($jsonResponse, true))
    ->toHaveKeys([
        'id',
        'name',
        'email',
        'email_verified_at',
        'created_at',
        'updated_at'
    ]);
});

test('users can create API tokens', function () {
    $user = User::factory()->create();
    actingAs($user);

    $response = $this->post(Route('token-create'))
    ->assertStatus(200);

    expect($jsonResponse = $response->getContent())->toBeJson();
    expect(json_decode($jsonResponse, true))->toHaveKey('token');
});
