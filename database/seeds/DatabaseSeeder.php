<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(create_data_setup::class);
        $this->call(create_data_quyen_user::class);
        $this->call(create_data_option_table::class);
    }
}
