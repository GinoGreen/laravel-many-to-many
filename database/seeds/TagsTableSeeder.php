<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $tags = ['Vuejs', 'Front-End', 'Back-End', 'UX', 'Data Science', 'Full Stack', 'JS', '3D', ];
      foreach ($tags as $tag) {
         $new_tag = new Tag();
         $new_tag->name = $tag;
         $new_tag->slug = Str::slug($tag, '-');
         $new_tag->save();
      }
   }
}
