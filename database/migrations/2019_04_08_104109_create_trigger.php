<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_User_Default_Member_Role AFTER INSERT ON `players` FOR EACH ROW
            BEGIN
                INSERT INTO player_more_informations (`id`, `player_id`) 
                VALUES (NEW.id, NEW.id);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
    }
}
