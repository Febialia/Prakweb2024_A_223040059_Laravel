<?php  
namespace App\Models;
use Illuminate\Support\Arr;
class Post {
    public static function all() {
        return [
            [
                'id' => 1,
                'slug' => 'artikel-1',
                'title' => 'Artikel 1',
                'author' => 'Febi Alia Rahman',
                'body' => ' Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel optio, neque harum tempora quia ad,
                enim alias unde exercitationem doloribus magni ab explicabo reprehenderit repellendus dolore ipsam nesciunt obcaecati quisquam.'
            ],
            [
                'id' => 2,
                'slug' => 'artikel-2',
                'title' => 'Artikel 2',
                'author' => 'Febi Alia Rahman',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed assumenda amet dolorem quos nisi, provident 
                laudantium itaque odio delectus quisquam esse fuga natus quibusdam voluptate harum neque voluptatem. Ipsum, quos.'
            ]
        ];
    }
    public static function find($slug): array 
    {
        //return Arrr::first(ststic::all(), function($post) use $slug){
        // return $post['slug'] == $slug;
        //});
        $post = Arr::first(static::all(), fn ($post) => $post ['slug'] == $slug );
        if(!$post){
            abort(404);
        }
        return $post;
    }
}