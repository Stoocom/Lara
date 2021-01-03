<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $fakeData = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $fakeData->sentence(rand(3,5)),
                'description' => $fakeData->realText(rand(50,100)),
                'active' => (boolean)rand(0,1),
                'source' => $fakeData->sentence(rand(5,10)),
                'publish_date' => $fakeData->date('Y-m-d'),
            ];
        }
        return $data;
    }
}
