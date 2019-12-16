<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class InsertTableServices extends Migration
{
    public function up()
    {
        DB::table('services')->insert([
            [
                'id' => 1,
                'name' => 'Android',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..',
                'icon' => 'fa-android',
            ],
            [
                'id' => 2,
                'name' => 'Apple IOS',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..',
                'icon' => 'fa-apple',
            ],
            [
                'id' => 3,
                'name' => 'Design',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..',
                'icon' => 'fa-dropbox',
            ],
            [
                'id' => 4,
                'name' => 'Concept',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..',
                'icon' => 'fa-html5',
            ],
            [
                'id' => 5,
                'name' => 'User Research',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..',
                'icon' => 'fa-slack',
            ],
            [
                'id' => 6,
                'name' => 'User Experience',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..',
                'icon' => 'fa-users',
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
