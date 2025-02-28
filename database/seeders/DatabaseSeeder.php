<?php

namespace Database\Seeders;

use App\Models\Download;
use App\Models\Info;
use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Weblink;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Item::factory(4)->for(Info::factory(), 'content')->create();
        Item::factory(2)->for(Weblink::factory(), 'content')->create();
        Item::factory(3)->for(Download::factory(), 'content')->create();
        Item::factory(1)->for(Info::factory(), 'content')->create();
    }
}
