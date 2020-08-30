<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = \App\Comment::create([
            "name"              => "Test Comment Name",
            "email"             => "test@comment.com",
            "body"              => "Test Comment 1",
            "user_id"           => 1,
            "commentable_id"    => 1,
            "commentable_type"  => "App\Post",
        ]);

        $commentReply = \App\Comment::create([
            "name"              => "Test Reply Name",
            "email"             => "test@Reply.com",
            "body"              => "Test Reply Comment 1",
            "parent_id"         => 1,
            "commentable_id"    => 1,
            "commentable_type"  => "App\Post",
        ]);

    } // End Of Run

} // End Of Seeder
