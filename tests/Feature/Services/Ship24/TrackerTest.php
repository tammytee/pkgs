<?php

namespace Tests\Feature\Services\Ship24;

use App\Services\Ship24\Tracker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TrackerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_track_a_package(): void
    {
        Http::fake(['https://api.ship24.com/*' => Tracker::fakeResponse()]);

        $response = app(Tracker::class)->track(['trackingNumber' => 'S24DEMO456393']);

        $this->assertEquals(200, $response->status());

        $this->assertSame('26148317-7502-d3ac-44a9-546d240ac0dd', $response->json('data.trackings.0.tracker.trackerId'));
        $this->assertSame('S24DEMO456393', $response->json('data.trackings.0.tracker.trackingNumber'));
        $this->assertSame('pending', $response->json('data.trackings.0.shipment.statusMilestone'));
    }
}
