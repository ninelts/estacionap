<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class App2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->string('name_brand', 45);
        
            $table->timestamps();
        
        });

        Schema::create('car', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->string('id');
            $table->integer('id_model');
            $table->integer('id_brand');
        
            $table->timestamps();
        
        });

        Schema::create('model', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->string('name_model', 45);
            $table->string('type_model', 45);
        
            $table->timestamps();
        
        });

        Schema::create('password_resets', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('email',200)->index();
            $table->string('token',200);
            $table->timestamp('created_at')->nullable();
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
        
        });

        Schema::create('payment', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->string('name_payment', 45);
            $table->integer('id_paytype');
        
            $table->timestamps();
        
        });

        Schema::create('payment_type', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->string('name_paytype', 45);
            $table->string('detail_paytype', 45);
        
            $table->timestamps();
        
        });

        Schema::create('qr_code', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->boolean('count_qrcode');
        
            $table->timestamps();
        
        });

        Schema::create('reserve', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->datetime('date_reserve')->default(null);
            $table->integer('id_tariff');
            $table->bigInteger('id_user')->unsigned();
            $table->integer('id_payment')->default(null);
            $table->integer('id_reservetype');
            $table->integer('id_servdet')->default(null);
            $table->integer('id_qrcode')->default(null);
            $table->integer('id_seat');
            $table->datetime('activate_reserve');
            $table->datetime('expiration_reserve');
            $table->datetime('expiration_reserve');
        
            $table->timestamps();
        
        });

        Schema::create('reserve_type', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->string('name_reservetype', 45);
            $table->string('description_reservetype', 255);
        
            $table->timestamps();
        
        });

        Schema::create('roles', function(Blueprint $table) {
        
            $table->increments('id');
            $table->string('name',20);
            $table->string('description',255);
            $table->timestamps();
        
        
        });

        Schema::create('role_user', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();            
            $table->timestamps();
        
        });

        Schema::create('seat', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id_seat');
            $table->tinyint('state_seat')->unsigned();
            $table->integer('id_seatsection');
        
            $table->timestamps();
        
        });

        Schema::create('seat_section', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id_seatsection');
            $table->string('name_seatsection', 45);
        
            $table->timestamps();
        
        });

        Schema::create('service_detail', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id_servdet');
            $table->time('starttime_servdet');
            $table->time('stoptime_servdet');
            $table->integer('duration_servdet');
            $table->string('mount_servdet', 45);
        
            $table->timestamps();
        
        });

        Schema::create('tariff', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id_tariff');
            $table->string('name_tariff', 45);
            $table->string('description_tariff', 45);
            $table->integer('value_tariff');
        
            $table->timestamps();
        
        });

        Schema::create('users', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('rut',9)->unique();
            $table->string('name');
            $table->string('last_name',50);
            $table->string('email',60)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->integer('phone')->length(9)->unsigned();
            $table->date('born');
            $table->rememberToken();
            $table->timestamps();
        
        });

        Schema::create('user_car', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id_usercar');
            $table->bigInteger('id_user')->unsigned();
            $table->string('id_car', 6);
        
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('user_car');
        Schema::drop('users');
        Schema::drop('tariff');
        Schema::drop('service_detail');
        Schema::drop('seat_section');
        Schema::drop('seat');
        Schema::drop('role_user');
        Schema::drop('roles');
        Schema::drop('reserve_type');
        Schema::drop('reserve');
        Schema::drop('qr_code');
        Schema::drop('payment_type');
        Schema::drop('payment');
        Schema::drop('password_resets');
        Schema::drop('model');
        Schema::drop('migrations');
        Schema::drop('car');
        Schema::drop('brand');

    }
}
