<?php

namespace Tests\Feature\Api;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class LeadApiTest extends TestCase
{
    use RefreshDatabase;

    private array $valid = [
        'name'           => 'Оксана Петренко',
        'phone'          => '+380501234567',
        'contact_method' => 'telegram',
        'source'         => 'contacts',
    ];

    public function test_creates_lead_with_valid_data(): void
    {
        $response = $this->postJson('/api/leads', $this->valid);

        $response->assertCreated()->assertJsonFragment(['success' => true]);
        $this->assertDatabaseHas('leads', [
            'name'           => 'Оксана Петренко',
            'contact_method' => 'telegram',
            'source'         => 'contacts',
        ]);
    }

    public function test_default_status_is_new(): void
    {
        $this->postJson('/api/leads', $this->valid)->assertCreated();

        $lead = Lead::first();
        $this->assertEquals('new', $lead->status);
    }

    public function test_company_is_stored_when_provided(): void
    {
        $this->postJson('/api/leads', [...$this->valid, 'company' => 'Моя Компанія', 'source' => 'opt'])
            ->assertCreated();

        $this->assertDatabaseHas('leads', ['company' => 'Моя Компанія']);
    }

    public function test_company_nullable_without_it(): void
    {
        $this->postJson('/api/leads', $this->valid)->assertCreated();

        $this->assertNull(Lead::first()->company);
    }

    public function test_name_required(): void
    {
        $this->postJson('/api/leads', [...$this->valid, 'name' => ''])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }

    public function test_phone_required(): void
    {
        $this->postJson('/api/leads', [...$this->valid, 'phone' => ''])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['phone']);
    }

    public function test_invalid_contact_method_rejected(): void
    {
        $this->postJson('/api/leads', [...$this->valid, 'contact_method' => 'signal'])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['contact_method']);
    }

    public function test_source_required(): void
    {
        $data = $this->valid;
        unset($data['source']);

        $this->postJson('/api/leads', $data)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['source']);
    }

    public function test_all_contact_methods_accepted(): void
    {
        foreach (['call', 'telegram', 'viber', 'whatsapp'] as $method) {
            $this->postJson('/api/leads', [...$this->valid, 'contact_method' => $method])
                ->assertCreated();
        }

        $this->assertCount(4, Lead::all());
    }

    public function test_admin_email_sent_when_configured(): void
    {
        Mail::fake();
        config(['mail.admin_email' => 'admin@pelovit.ua']);

        $this->postJson('/api/leads', $this->valid)->assertCreated();

        Mail::assertSent(\App\Mail\LeadNotification::class, fn ($m) => $m->hasTo('admin@pelovit.ua'));
    }

    public function test_no_email_sent_without_admin_config(): void
    {
        Mail::fake();
        config(['mail.admin_email' => null]);

        $this->postJson('/api/leads', $this->valid)->assertCreated();

        Mail::assertNothingSent();
    }
}
