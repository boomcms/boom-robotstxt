<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class InstallRobotstxtEditor extends Migration
{
    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('robots', function (Blueprint $table) {
            $table->increments('id');
			$table->text('rules', 65535)->nullable();
			$table->integer('edited_at')->unsigned()->nullable();
			$table->smallInteger('edited_by')->unsigned()->nullable();
			
			$table
                    ->foreign('edited_by')
                    ->references('id')
                    ->on('people')
                    ->onUpdate('CASCADE')
                    ->onDelete('set null');
 
        });
		
		DB::table('roles')
			->insert([
				'name' => 'manage_robots' 
			]);
    }

    /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        Schema::drop('robots');
		
		DB::table('roles')
			->where('name', '=', 'manage_robots')
			->delete();
    }
}