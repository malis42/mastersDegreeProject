<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name');
        });

        $this->generateDefaultRecord('Patient');
        $this->generateDefaultRecord('Medical staff');
    }

    /**
     * Method used to insert default data into table
     *
     * @param string $name
     */
    public function generateDefaultRecord(string $name)
    {
        DB::table('users_roles')->insert(
          [
              'role_name' => $name,
          ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
