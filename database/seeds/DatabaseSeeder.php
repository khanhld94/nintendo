<?php

use Illuminate\Database\Seeder;
use \App\Game;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	foreach (range(1,3) as $index) {
	        $game = Game::create([
	            'name' => $faker->name,
	            'description' => $faker->word,
	            'content' => $faker->word,
	            'image' => 'Super_Mario_Bros._box.png',
                'resource' => 'Super Mario Bros.zip',
                'system_id' => '1'                
	        ]);
	        DB::table('category_game')->insert([
	        	'game_id' => $game->id,
	        	'category_id' => '1'
	        ]);
        }

        foreach (range(1,3) as $index) {
	        $game = Game::create([
	            'name' => $faker->name,
	            'description' => $faker->word,
	            'content' => $faker->word,
	            'image' => 'Contra_cover.jpg',
                'resource' => 'Contra (USA).zip',
                'system_id' => '1'                
	        ]);
	        DB::table('category_game')->insert([
	        	'game_id' => $game->id,
	        	'category_id' => '1'
	        ]);
        }

        foreach (range(1,3) as $index) {
	        $game = Game::create([
	            'name' => $faker->name,
	            'description' => $faker->word,
	            'content' => $faker->word,
	            'image' => 'Naruto_ninja_council_2_cover.jpg',
                'resource' => 'Naruto - Ninja Council 2 (U).zip',
                'system_id' => '1'                
	        ]);
	        DB::table('category_game')->insert([
	        	'game_id' => $game->id,
	        	'category_id' => '1'
	        ]);
        }
    }
}
