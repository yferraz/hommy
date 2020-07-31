<?php

use Illuminate\Database\Seeder;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Republic::class,12)->create()->each(function($republic){
            $user = App\User::findOrFail($republic->user_id);
            $comments = factory (App\Comment::class,2)->make();
            $republic->comentariosRepublica()->saveMany($comments);
            $republic->userFavoritas()->attach($user->id);
        });
    }
}
