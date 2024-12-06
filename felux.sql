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
            $table->string('acctype');
            $table->string('country');
            $table->string('infos');
            $table->integer('price');
            $table->string('url');
            $table->integer('sold');
            $table->string('sto');
            $table->text('dateofsold')->nullable();
            $table->text('date');
            $table->string('sellers');
            $table->string('reported');
            $table->string('sitename');
            $table->string('login')->nullable();
            $table->string('pass')->nullable();
            $table->timestamps();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('acctype');
            $table->string('country');
            $table->text('infos');
            $table->integer('price');
            $table->text('url');
            $table->integer('sold');
            $table->string('sto');
            $table->text('dateofsold')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('date');
            $table->string('sellers');
            $table->string('reported');
            $table->string('bankname');
            $table->integer('balance');
            $table->timestamps();
        });

        Schema::create('cpanels', function (Blueprint $table) {
            $table->id();
            $table->string('acctype');
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->integer('sold');
            $table->string('sto');
            $table->timestamp('dateofsold')->useCurrent();
            $table->string('sellers');
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
            $table->string('acctype');
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->string('sellers');
            $table->integer('sold');
            $table->string('sto');
            $table->text('dateofsold');
            $table->text('date');
            $table->text('number');
            $table->text('reported');
            $table->text('login')->nullable();
            $table->text('pass')->nullable();
            $table->timestamps();
        });

        Schema::create('mailers', function (Blueprint $table) {
            $table->id();
            $table->string('acctype');
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->string('sellers');
            $table->integer('sold');
            $table->timestamp('date')->useCurrent();
            $table->timestamp('dateofsold')->useCurrent();
            $table->string('reported');
            $table->string('sto');
            $table->timestamps();
        });

        Schema::create('manager', function (Blueprint $table) {
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

        Schema::create('newseller', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });

        Schema::create('payment', function (Blueprint $table) {
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
            $table->integer('sellers_id');
            $table->string('buyer');
            $table->string('type');
            $table->timestamp('date')->useCurrent();
            $table->string('country');
            $table->string('infos');
            $table->string('url');
            $table->string('login');
            $table->string('pass');
            $table->integer('price');
            $table->string('sellers');
            $table->string('reported');
            $table->integer('reportid')->nullable();
            $table->timestamps();
        });

        Schema::create('rdps', function (Blueprint $table) {
            $table->id();
            $table->string('acctype');
            $table->string('country');
            $table->string('city');
            $table->string('hosting');
            $table->integer('ram');
            $table->string('url');
            $table->integer('price');
            $table->string('sellers');
            $table->integer('sold');
            $table->timestamps();
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->string('users_id');
            $table->integer('seen')->default(1);
            $table->string('status')->default('1');
            $table->string('acctype');
            $table->date('date');
            $table->integer('orderid');
            $table->integer('price');
            $table->text('lastreply');
            $table->text('lastup');
            $table->string('sellers');
            $table->timestamps();
        });

        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->integer('unsoldb');
            $table->integer('soldb');
            $table->integer('isold');
            $table->integer('iunsold');
            $table->text('activate');
            $table->text('btc');
            $table->text('withdrawal');
            $table->integer('allsales')->nullable();
            $table->integer('lastweek')->nullable();
            $table->timestamps();
        });

        Schema::create('scampages', function (Blueprint $table) {
            $table->id();
            $table->string('acctype');
            $table->text('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->string('sellers');
            $table->integer('sold');
            $table->string('sto');
            $table->text('dateofsold');
            $table->text('date');
            $table->string('scamname');
            $table->timestamps();
        });

        Schema::create('smtps', function (Blueprint $table) {
            $table->id();
            $table->string('acctype');
            $table->string('country');
            $table->text('infos');
            $table->integer('price');
            $table->string('url');
            $table->integer('sold');
            $table->string('sto');
            $table->timestamp('dateofsold')->useCurrent();
            $table->timestamp('date')->useCurrent();
            $table->string('sellers');
            $table->string('reported');
            $table->timestamps();
        });

        Schema::create('stufs', function (Blueprint $table) {
            $table->id();
            $table->string('acctype');
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->string('sellers');
            $table->integer('sold');
            $table->text('date');
            $table->text('dateofsold');
            $table->string('reported');
            $table->string('sto');
            $table->text('domain');
            $table->timestamps();
        });

        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('users_id');
            $table->integer('status');
            $table->integer('sellers_id');
            $table->text('sellers_url');
            $table->text('memo');
            $table->integer('acctype');
            $table->integer('admin_r');
            $table->text('date');
            $table->string('subject');
            $table->string('type');
            $table->integer('sellers');
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
            $table->string('acctype');
            $table->string('country');
            $table->text('infos');
            $table->text('url');
            $table->integer('price');
            $table->string('sellers');
            $table->integer('sold');
            $table->string('sto');
            $table->text('dateofsold');
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
            $table->text('ipurchassed')->nullable();
            $table->text('ip')->nullable();
            $table->date('lastlogin')->nullable();
            $table->date('datereg')->nullable();
            $table->integer('sellers');
            $table->text('img')->nullable();
            $table->string('testemail')->nullable();
            $table->integer('resetpin')->default(0);
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
        Schema::dropIfExists('manager');
        Schema::dropIfExists('news');
        Schema::dropIfExists('newseller');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('rdps');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('sellers');
        Schema::dropIfExists('scampages');
        Schema::dropIfExists('smtps');
        Schema::dropIfExists('stufs');
        Schema::dropIfExists('ticket');
        Schema::dropIfExists('tutorials');
        Schema::dropIfExists('users');
    }
};