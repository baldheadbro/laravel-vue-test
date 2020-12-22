<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceType;
use DB;

class ServiceTypeSeeder extends Seeder
{

    protected $fillable = [ 'name' ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create using ORM
        ServiceType::create(['name' => 'Производственная']);
        ServiceType::create(['name' => 'Распределительная']);
        ServiceType::create(['name' => 'Профессиональная']);
        ServiceType::create(['name' => 'Потребительская']);

        // Create using query builder
        DB::table('service_types')->insert([
            'created_at' => DB::raw('now()'),
            'updated_at' => DB::raw('now()'),
            'name' => 'Общественная',
        ]);

    }

    

}
