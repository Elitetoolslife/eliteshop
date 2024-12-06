
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->string('infos');
            $table->integer('price');
            $table->string('url');
            $table->integer('sold');
            $table->string('stock');
            $table->timestamp('dateofsold')->useCurrent();
            $table->text('date');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->string('reported');
            $table->string('sitename');
            $table->string('login')->nullable();
            $table->string('pass')->nullable();
            $table->timestamps();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->text('infos');
            $table->integer('price');
            $table->text('url');
            $table->integer('sold');
            $table->string('stock');
            $table->timestamp('dateofsold')->useCurrent();
            $table->text('date');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->string('reported');
            $table->string('bankname');
            $table->integer('balance');
            $table->timestamps();
        });

        Schema::create('cpanels', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->integer('sold');
            $table->string('stock');
            $table->timestamp('dateofsold')->useCurrent();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->timestamp('date')->useCurrent();
            $table->string('reported');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('image_text');
            $table->timestamps();
        });

        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->integer('sold');
            $table->string('stock');
            $table->timestamp('dateofsold')->useCurrent();
            $table->text('date');
            $table->text('number');
            $table->text('reported');
            $table->text('login')->nullable();
            $table->text('pass')->nullable();
            $table->timestamps();
        });

        Schema::create('mailers', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->integer('sold');
            $table->timestamp('date')->useCurrent();
            $table->timestamp('dateofsold')->useCurrent();
            $table->string('reported');
            $table->string('stock');
            $table->timestamps();
        });

        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });

        Schema::create('newsellers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('method');
            $table->double('amount');
            $table->integer('amountusd');
            $table->text('address');
            $table->text('p_data');
            $table->text('state');
            $table->text('date');
            $table->timestamps();
        });

        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->string('buyer');
            $table->enum('type', ['type1', 'type2', 'type3']);
            $table->timestamp('date')->useCurrent();
            $table->string('country');
            $table->string('infos');
            $table->string('url');
            $table->string('login');
            $table->string('pass');
            $table->integer('price');
            $table->string('reported');
            $table->integer('reportid')->nullable();
            $table->timestamps();
        });

        Schema::create('rdps', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->string('city');
            $table->string('hosting');
            $table->integer('ram');
            $table->string('url');
            $table->integer('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->integer('sold');
            $table->timestamps();
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('seen')->default(1);
            $table->enum('status', ['1', '2', '3'])->default('1');
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->date('date');
            $table->integer('orderid');
            $table->integer('price');
            $table->text('lastreply');
            $table->text('lastup');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->unsignedInteger('unsoldb')->default(0);
            $table->unsignedInteger('soldb')->default(0);
            $table->unsignedInteger('isold')->default(0);
            $table->unsignedInteger('iunsold')->default(0);
            $table->text('activate')->nullable();
            $table->text('btc')->nullable();
            $table->text('withdrawal')->nullable();
            $table->unsignedInteger('allsales')->nullable();
            $table->unsignedInteger('lastweek')->nullable();
            $table->timestamps();
        });

        Schema::create('scampages', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->text('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->integer('sold');
            $table->string('stock');
            $table->timestamp('dateofsold')->useCurrent();
            $table->text('date');
            $table->string('scamname');
            $table->timestamps();
        });

        Schema::create('smtps', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->text('infos');
            $table->integer('price');
            $table->string('url');
            $table->integer('sold');
            $table->string('stock');
            $table->timestamp('dateofsold')->useCurrent();
            $table->timestamp('date')->useCurrent();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->string('reported');
            $table->timestamps();
        });

        Schema::create('shells', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->integer('sold');
            $table->timestamp('date')->useCurrent();
            $table->timestamp('dateofsold')->useCurrent();
            $table->string('reported');
            $table->string('stock');
            $table->text('domain');
            $table->timestamps();
        });

        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['1', '2', '3']);
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->text('sellers_url');
            $table->text('memo');
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->integer('admin_reply');
            $table->timestamp('date')->useCurrent();
            $table->string('subject');
            $table->enum('type', ['type1', 'type2', 'type3']);
            $table->integer('price');
            $table->string('refounded');
            $table->text('fmemo');
            $table->integer('seen');
            $table->string('lastreply');
            $table->text('lastup');
            $table->timestamps();
        });

        Schema::create('tutorials', function (Blueprint $table) {
            $table->id();
            $table->enum('acctype', ['type1', 'type2', 'type3']);
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->integer('sold');
            $table->string('stock');
            $table->timestamp('dateofsold')->useCurrent();
            $table->text('date');
            $table->string('tutoname');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->integer('balance')->default(0);
            $table->text('item_purchased')->nullable();
            $table->text('ip_address')->nullable();
            $table->date('last_login')->nullable();
            $table->boolean('is_seller')->default(0);
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('set null');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
            $table->integer('reset_pin')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('cpanels');
        Schema::dropIfExists('images');
        Schema::dropIfExists('leads');
        Schema::dropIfExists('mailers');
        Schema::dropIfExists('managers');
        Schema::dropIfExists('news');
        Schema::dropIfExists('newsellers');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('rdps');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('sellers');
        Schema::dropIfExists('scampages');
        Schema::dropIfExists('smtps');
        Schema::dropIfExists('shells');
        Schema::dropIfExists('support_tickets');
        Schema::dropIfExists('tutorials');
        Schema::dropIfExists('users');
    }
}