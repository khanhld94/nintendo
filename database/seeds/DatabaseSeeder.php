<?php

use Illuminate\Database\Seeder;
use \App\Game;
use \App\TotalVote;
use \App\Vote;
use \App\User;
use \App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //    $faker = Faker\Factory::create();

    	// foreach (range(1,3) as $index) {
	    //     $game = Game::create([
	    //         'name' => $faker->name,
	    //         'description' => $faker->word,
	    //         'content' => $faker->word,
	    //         'image' => 'Super_Mario_Bros._box.png',
     //            'resource' => 'Super Mario Bros.zip',
     //            'system_id' => '1'                
	    //     ]);
	    //     DB::table('category_game')->insert([
	    //     	'game_id' => $game->id,
	    //     	'category_id' => '1'
	    //     ]);
     //    }

     //    foreach (range(1,3) as $index) {
	    //     $game = Game::create([
	    //         'name' => $faker->name,
	    //         'description' => $faker->word,
	    //         'content' => $faker->word,
	    //         'image' => 'Contra_cover.jpg',
     //            'resource' => 'Contra (USA).zip',
     //            'system_id' => '1'                
	    //     ]);
	    //     DB::table('category_game')->insert([
	    //     	'game_id' => $game->id,
	    //     	'category_id' => '1'
	    //     ]);
     //    }

     //    foreach (range(1,3) as $index) {
	    //     $game = Game::create([
	    //         'name' => $faker->name,
	    //         'description' => $faker->word,
	    //         'content' => $faker->word,
	    //         'image' => 'Naruto_ninja_council_2_cover.jpg',
     //            'resource' => 'Naruto - Ninja Council 2 (U).zip',
     //            'system_id' => '1'                
	    //     ]);
	    //     DB::table('category_game')->insert([
	    //     	'game_id' => $game->id,
	    //     	'category_id' => '1'
	    //     ]);
     //    }
    	// $games = Game::all();
    	// $faker = Faker\Factory::create();
    	// foreach ($games as $game) {
    	// 	ToTalVote::create([
    	// 		'item_id' => $game->id,
    	// 		'total_like' => $faker->numberBetween(1,100),
    	// 		'total_dislike' => $faker->numberBetween(1,10),
    	// 	]);
    	// }
    $faker = Faker\Factory::create();
    foreach (range(1,10) as $index) {
        $user = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
        ]);
        $games = Game::all();
        foreach ($games as $key => $game) {
            Comment::create([
                'game_id' => $game->id,
                'user_id' => $user->id,
                'body' => $faker->word
            ]);
        }
    }
    	
    }
}
