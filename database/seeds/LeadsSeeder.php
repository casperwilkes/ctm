<?php

use Illuminate\Database\Seeder;

class LeadsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\Leads::class, 25)->create();
    }
}
