<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name'=>'Personal',
        //     'slug'=>'personal'
        // ]);

        // $family = Category::create([
        //     'name'=>'Family',
        //     'slug'=>'family'
        // ]);

        // $work = Category::create([
        //     'name'=>'Work',
        //     'slug'=>'work'
        // ]);

        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$family->id,
        //     'title'=>'My Family Post',
        //     'slug'=>'my-family-post',
        //     'excerpt'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec rutrum tellus. Donec convallis sapien vel elit consectetur, vel rutrum ligula auctor. Maecenas semper magna eget eleifend venenatis. Sed non venenatis quam, sit amet egestas odio. Duis feugiat pulvinar dui, nec posuere lacus vestibulum id. In ultricies commodo massa, laoreet venenatis mauris porta non. Vestibulum aliquam massa eget ligula dictum rutrum. Nulla quis elit eros. Vivamus lectus est, elementum bibendum euismod nec, eleifend quis turpis. Nunc lobortis, urna in maximus cursus, erat augue porttitor lorem, nec vulputate est eros quis ante. Suspendisse feugiat elementum leo nec ultrices. Curabitur nec commodo felis.</p>'
        // ]);

        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$work->id,
        //     'title'=>'My Work Post',
        //     'slug'=>'my-work-post',
        //     'excerpt'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec rutrum tellus. Donec convallis sapien vel elit consectetur, vel rutrum ligula auctor. Maecenas semper magna eget eleifend venenatis. Sed non venenatis quam, sit amet egestas odio. Duis feugiat pulvinar dui, nec posuere lacus vestibulum id. In ultricies commodo massa, laoreet venenatis mauris porta non. Vestibulum aliquam massa eget ligula dictum rutrum. Nulla quis elit eros. Vivamus lectus est, elementum bibendum euismod nec, eleifend quis turpis. Nunc lobortis, urna in maximus cursus, erat augue porttitor lorem, nec vulputate est eros quis ante. Suspendisse feugiat elementum leo nec ultrices. Curabitur nec commodo felis.</p>'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
