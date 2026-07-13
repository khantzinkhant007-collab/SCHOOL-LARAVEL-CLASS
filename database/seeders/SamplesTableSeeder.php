<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sample;

class SamplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::transaction(function () {
            // Sample::insert([
            //     [
            //         'title' => 'Global Education Awards',
            //         'body'  => '本文１'

            //     ],
            //     [
            //         'title' => '地球祭が今年も開催！！',
            //         'body'  => '本文２'

            //     ],
            //     [
            //         'title' => ' 「ハロウィンDay」でした。',
            //         'body'  => '本文３'
            //     ],

            // ]);

            Sample::factory()->count(103)->create();

        });
    }
}
