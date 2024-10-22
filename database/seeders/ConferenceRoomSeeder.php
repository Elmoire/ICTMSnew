<?php

namespace Database\Seeders;

use App\Models\ConferenceRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConferenceRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createConferenceRoom('magiting');
        $this->createConferenceRoom('maagap');
    }

    private function createConferenceRoom(string $type): void
    {
        $conferenceRoom = ConferenceRoom::factory()->$type()->make();
        if (!ConferenceRoom::query()->where('CRoomID', $conferenceRoom->CRoomID)->exists()) {
            $conferenceRoom->save();
        } else {
            echo "<script>alert('Duplicate ID found for Conference Room');</script>";
        }
    }
}
