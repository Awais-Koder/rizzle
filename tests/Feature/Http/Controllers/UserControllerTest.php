<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\City;
use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserController
 */
final class UserControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('users.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserController::class,
            'store',
            \App\Http\Requests\UserStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $city = City::factory()->create();
        $department = Department::factory()->create();
        $name = $this->faker->name();
        $age = $this->faker->numberBetween(-10000, 10000);
        $gender = $this->faker->word();
        $password = $this->faker->password();
        $phone_number = $this->faker->phoneNumber();
        $type = $this->faker->word();

        $response = $this->post(route('users.store'), [
            'city_id' => $city->id,
            'department_id' => $department->id,
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'password' => $password,
            'phone_number' => $phone_number,
            'type' => $type,
        ]);

        $users = User::query()
            ->where('city_id', $city->id)
            ->where('department_id', $department->id)
            ->where('name', $name)
            ->where('age', $age)
            ->where('gender', $gender)
            ->where('password', $password)
            ->where('phone_number', $phone_number)
            ->where('type', $type)
            ->get();
        $this->assertCount(1, $users);
        $user = $users->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }
}
