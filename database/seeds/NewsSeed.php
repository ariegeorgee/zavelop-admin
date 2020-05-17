<?php

use Illuminate\Database\Seeder;

class NewsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Berita', 'description' => '<p>Register and create menus/fields/relationships online, install modules. No coding required. Test your panel on our server.</p>

<p>View generated Laravel files at any time. Download the whole project. Unarchive and install it on your server with a few commands.</p>

<p>Your project is made only of Laravel files. No QuickAdminPanel dependency. So add/change any code easily. Our team can also help!</p>
', 'meta_title' => 'Berita', 'meta_description' => 'Berita Description',],
            ['id' => 2, 'title' => 'ads', 'description' => '<p>asd</p>
', 'meta_title' => null, 'meta_description' => null,],

        ];

        foreach ($items as $item) {
            \App\News::create($item);
        }
    }
}
