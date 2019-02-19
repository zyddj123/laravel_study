<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test')->insert([
        	['name'=>'zhaoliu','pwd'=>123456],
        	['name'=>'qianduoduo','pwd'=>123456]
        ]);
    }
}
