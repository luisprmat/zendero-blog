<?php

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class)->create([
            'title' => 'Mi primer post',
            'excerpt' => 'Extracto de mi primer post',
            'body' => '<p>Contenido de mi primer post</p>',
            'published_at' => now()
        ]);

        factory(Post::class)->create([
            'title' => 'Mi segundo post',
            'excerpt' => 'Extracto de mi segundo post',
            'body' => '<p>Contenido de mi segundo post</p>',
            'published_at' => now()
        ]);

        factory(Post::class)->create();

        factory(Post::class)->create([
            'title' => 'No difference how many peaks you reach if there was no pleasure in the climb.',
            'excerpt' => 'Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.',
            'published_at' => Carbon::createFromFormat('Y-m-d', '2019-09-20')
        ]);
    }
}
