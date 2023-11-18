<?php

use App\Models\User;

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertNoContent();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->withHeaders([
        'accept' => 'application/json'
    ])
    ->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])->assertStatus(422);

    $this->assertGuest();
});
