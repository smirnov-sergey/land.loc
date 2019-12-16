<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class InsertTablePortfolios extends Migration
{
    public function up()
    {
        DB::table('portfolios')->insert([
            [
                'id' => 1,
                'name' => 'Finance App',
                'images' => 'portfolio_pic2.jpg',
                'filter' => 'GPS',
            ],
            [
                'id' => 2,
                'name' => 'Concept',
                'images' => 'portfolio_pic3.jpg',
                'filter' => 'design',
            ],
            [
                'id' => 3,
                'name' => 'Shopping',
                'images' => 'portfolio_pic4.jpg',
                'filter' => 'android',
            ],
            [
                'id' => 4,
                'name' => 'Managment',
                'images' => 'portfolio_pic5.jpg',
                'filter' => 'design',
            ],
            [
                'id' => 5,
                'name' => 'iPhone',
                'images' => 'portfolio_pic6.jpg',
                'filter' => 'web',
            ],
            [
                'id' => 6,
                'name' => 'Nexus',
                'images' => 'portfolio_pic7.jpg',
                'filter' => 'web',
            ],
            [
                'id' => 7,
                'name' => 'Android',
                'images' => 'portfolio_pic8.jpg',
                'filter' => 'android',
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
