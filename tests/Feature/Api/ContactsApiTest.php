<?php

namespace Tests\Feature\Api;

use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactsApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_team_key(): void
    {
        $this->getJson('/api/contacts')
            ->assertOk()
            ->assertJsonStructure(['team']);
    }

    public function test_returns_all_team_members(): void
    {
        TeamMember::factory(3)->create();

        $this->getJson('/api/contacts')
            ->assertOk()
            ->assertJsonCount(3, 'team');
    }

    public function test_team_ordered_by_sort_order(): void
    {
        TeamMember::factory()->create(['name' => 'Third', 'sort_order' => 3]);
        TeamMember::factory()->create(['name' => 'First',  'sort_order' => 1]);
        TeamMember::factory()->create(['name' => 'Second', 'sort_order' => 2]);

        $response = $this->getJson('/api/contacts');

        $names = collect($response->json('team'))->pluck('name')->all();
        $this->assertEquals(['First', 'Second', 'Third'], $names);
    }

    public function test_empty_team_returns_empty_array(): void
    {
        $this->getJson('/api/contacts')
            ->assertOk()
            ->assertJson(['team' => []]);
    }
}
