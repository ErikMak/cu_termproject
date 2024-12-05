<?php

namespace Tests\Feature;

use App\Models\Part;
use App\Models\Software;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PartAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithoutMiddleware;
    use DatabaseTransactions;

    public function test_get_all_parts()
    {
        $response = $this->getJson('/api/parts');
        $response->assertOk();
    }

    public function test_store_part() {
        $soft = Software::all()->first();

        $response = $this->postJson('/api/parts', [
            'name' => 'Product',
            'manufacturer' => 'AManufacturer',
            'price' => 1000,
            'warranty' => '2 месяца',
            'device_id' => $soft['device_id'],
            'category' => 'Материнские платы'
        ]);

        $this->assertDatabaseHas('parts', [
            'name' => 'Product',
            'manufacturer' => 'AManufacturer',
            'price' => 1000,
            'warranty' => '2 месяца',
            'device_id' => $soft['device_id'],
            'category' => 'Материнские платы'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'Компонент успешно добавлен!'
            ]);
    }

    public function test_store_part_with_incorrect_device_id() {
        $response = $this->postJson('/api/parts', [
            'name' => 'Product',
            'manufacturer' => 'AManufacturer',
            'price' => 1000,
            'warranty' => '2 месяца',
            'device_id' => '123',
            'category' => 'Материнские платы'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => 'Такого Device ID не существует!'
            ]);
    }

    public function test_show_part() {
        $part = Part::all()->first();

        $model_number = $part['model_number'];

        $response = $this->getJson('/api/parts/'.$model_number);

        $this->assertEquals($part['model_number'], $response['data']['model_number']);
    }

    public function test_destroy_part() {
        $part = Part::all()->first();

        $model_number = $part['model_number'];

        $this->deleteJson('/api/parts/'.$model_number);

        $this->assertDatabaseMissing('parts', [
            'model_number' => $model_number
        ]);
    }

    public function test_update_part() {
        $part = Part::all()->first();

        $response = $this->putJson('/api/parts/'.$part['model_number'], [
            'name' => 'Product',
            'manufacturer' => 'AManufacturer',
            'price' => 1000,
            'warranty' => '2 месяца',
            'device_id' => $part['device_id'],
            'category' => 'Материнские платы'
        ]);

        $this->assertDatabaseHas('parts', [
            'name' => 'Product',
            'manufacturer' => 'AManufacturer',
            'price' => 1000,
            'warranty' => '2 месяца',
            'device_id' => $part['device_id'],
            'category' => 'Материнские платы'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'Компонент успешно обновлен!'
            ]);
    }

    public function test_update_part_with_incorrect_device_id() {
        $part = Part::all()->first();

        $response = $this->putJson('/api/parts/'.$part['model_number'], [
            'name' => 'Product',
            'manufacturer' => 'AManufacturer',
            'price' => 1000,
            'warranty' => '2 месяца',
            'device_id' => '123',
            'category' => 'Материнские платы'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => 'Такого Device ID не существует!'
            ]);
    }
}
