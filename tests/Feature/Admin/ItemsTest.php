<?php

use App\Models\Download;
use App\Models\Info;
use App\Models\Item;
use App\Models\Weblink;
use Inertia\Testing\AssertableInertia as Assert;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('deleting an item deletes the item', function () {
    $user = User::factory()->create(['admin' => true]);
    $this->actingAs($user);

    $item = Item::factory()
        ->has(Info::factory(), 'content')
        ->create([
            'name' => 'Test Item',
            'content_type' => 'info',
        ]);

    $this->delete(route('admin.items.delete', $item));

    $this->assertDatabaseMissing('items', [
        'id' => $item->id,
        'name' => 'Test Item',
    ]);
});
