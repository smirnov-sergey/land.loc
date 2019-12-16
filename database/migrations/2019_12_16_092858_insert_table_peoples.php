<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class InsertTablePeoples extends Migration
{
    public function up()
    {
        DB::table('peoples')->insert([
            [
                'id' => 1,
                'name' => 'Tom Rensed',
                'position' => 'Chief Executive Officer',
                'images' => 'team_pic1.jpg',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.',
            ],
            [
                'id' => 2,
                'name' => 'Kathren Mory',
                'position' => 'Vice President',
                'images' => 'team_pic2.jpg',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.',
            ],
            [
                'id' => 3,
                'name' => 'Lancer Jack',
                'position' => 'Senior Manager',
                'images' => 'team_pic3.jpg',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.',
            ],

        ]);
    }

    public function down()
    {
        Schema::dropIfExists('peoples');
    }
}
