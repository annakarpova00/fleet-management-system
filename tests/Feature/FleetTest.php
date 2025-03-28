<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use App\Models\Fleet;
use App\Models\Car;

class FleetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_fleets_list()
    {
        Fleet::factory()->create(['title' => 'Автопарк 1', 'address' => 'street']);
        Fleet::factory()->create(['title' => 'Автопарк 2', 'address' => 'street1']);

        $response = $this->get('/fleets');

        $response->assertStatus(200);

        $response->assertSee('Автопарк 1');
        $response->assertSee('Автопарк 2');
    }

    public function it_displays_a_single_fleet_with_its_cars()
    {
        $fleet = Fleet::factory()->create([
            'title' => 'Тестовый автопарк',
            'address' => 'ул. Тестовая, 42'
        ]);

        $car1 = Car::factory()->create(['number' => 'А123ВЕ']);
        $car2 = Car::factory()->create(['number' => 'О456ТР']);
        $fleet->cars()->attach([$car1->id, $car2->id]);

        $response = $this->get(route('fleets.show', $fleet));

        $response->assertStatus(200);

        $response->assertSee($fleet->title);

        $response->assertSee($fleet->address);

        $response->assertSee('А123ВЕ');
        $response->assertSee('О456ТР');
    }

}
