<?php

use App\Models\Download;
use App\Models\Info;
use App\Models\Item;
use App\Models\Weblink;
use Inertia\Testing\AssertableInertia as Assert;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $response = $this->get('/dashboard');
    $response->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/dashboard');
    $response->assertStatus(200);
});

test('dashboard search returns a valid item', function () {
    // without exception handling
    $this->withoutExceptionHandling();

    $user = User::factory()->create();
    $this->actingAs($user);

    // Create items
    $testItem = Item::factory()
        ->has(Info::factory(), 'content')
        ->create([
            'name' => 'Test Item',
            'content_type' => 'info',
        ]);

    $this->post('/dashboard', [
        'search' => 'test',
    ])->assertInertia(fn (Assert $page) => $page
        ->component('Dashboard')
        ->has('items', 1, function (Assert $page) use ($testItem) {
            $page->where('id', $testItem->id)
                ->where('name', 'Test Item')
                ->etc();
        })
    );
});
