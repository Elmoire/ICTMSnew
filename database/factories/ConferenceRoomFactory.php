<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\IDGenerator;
use App\Models\ConferenceRoom;
/**
 * @extends Factory<ConferenceRoom>
 */
class ConferenceRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ConferenceRoom::class;

    public function definition(): array
    {
        $idGenerator = new IDGenerator();
        return [
            'CRoomID' => $idGenerator->generateID_3(),
            'Availability' => 'Available',
            'CRoomName' => $this->faker->name(),
            'Location' => $this->faker->city(),
            'Capacity' => $this->faker->numberBetween(1, 50),
        ];
    }
    public function generateUniqueID(): string
    {
        $idGenerator = new IDGenerator();
        do {
            $generatedID = $idGenerator->generateID_10();
        } while (ConferenceRoom::query()->where('CRoomID', $generatedID)->exists());

        return $generatedID;
    }

    public function magiting(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatedID = $this->generateUniqueID();
            return [
                'CRoomID' => $generatedID,
                'CRoomName' => 'Magiting',
                'Capacity' => 50,
                'Location' => 'Diamond Building',
            ];
        });
    }

    public function maagap(): Factory
    {
        return $this->state(function (array $attributes) {
            $generatedID = $this->generateUniqueID();
            return [
                'CRoomID' => $generatedID,
                'CRoomName' => 'Maagap',
                'Capacity' => 20,
                'Location' => 'Emerald Building',
            ];
        });
    }
}
