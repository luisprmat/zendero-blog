<?php

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    protected $tags;
    protected $categories;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        $this->fetchRelations();

        $category1 = $this->categories->firstWhere('name', 'Ensayos');

        $post1 = factory(Post::class)->create([
            'title' => 'Mi primer post',
            'url' => Str::slug('Mi primer post'),
            'excerpt' => 'Extracto de mi primer post',
            'body' => '<p>Contenido de mi primer post</p>',
            'published_at' => now(),
            'category_id' => $category1->id,
            'user_id' => 1
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post1->id,
            'tag_id' => $this->tags->find(1)->id
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post1->id,
            'tag_id' => $this->tags->find(2)->id
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post1->id,
            'tag_id' => $this->tags->find(3)->id
        ]);

        $post2 = factory(Post::class)->create([
            'title' => 'Mi segundo post',
            'url' => Str::slug('Mi segundo post'),
            'excerpt' => 'Extracto de mi segundo post',
            'body' => '<p>Contenido de mi segundo post</p>',
            'published_at' => now(),
            'category_id' => $this->categories->firstWhere('name', 'Paisajes'),
            'user_id' => 2
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post2->id,
            'tag_id' => $this->tags->find(1)->id
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post2->id,
            'tag_id' => $this->tags->find(3)->id
        ]);

        $post3 = factory(Post::class)->create([
            'category_id' => $this->categories->firstWhere('name', 'Paisajes'),
            'user_id' => 1
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post3->id,
            'tag_id' => $this->tags->find(1)->id
        ]);

        factory(Post::class)->create([
            'title' => 'No difference how many peaks you reach if there was no pleasure in the climb.',
            'excerpt' => 'Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.',
            'published_at' => Carbon::createFromFormat('Y-m-d', '2019-09-20'),
            'category_id' => factory(Category::class)->create()->id,
            'user_id' => 2
        ]);

        factory(Post::class)->create([
            'title' => 'This is other post',
            'excerpt' => 'This is an excerpt for my new post',
            'published_at' => now(),
            'category_id' => $this->categories->firstWhere('name', 'Paisajes'),
            'user_id' => 1
        ]);
    }

    protected function fetchRelations()
    {
        $this->tags = Tag::all();
        $this->categories = Category::all();
    }
}
