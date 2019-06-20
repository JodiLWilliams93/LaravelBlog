<?php

use Illuminate\Database\Seeder;

class TutorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutorial = new \App\Tutorial([
            'title' => 'First Tutorial',
            'content' => 'This is the first tutorial for the Laravel Guide.'
        ]);
        $tutorial->save();

        $tutorial = new \App\Tutorial([
            'title' => 'Second Tutorial',
            'content' => 'This is the another tutorial in the Laravel Guide.'
        ]);
        $tutorial->save();

    }
}
