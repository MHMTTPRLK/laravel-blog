<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            //$table->unsignedBigInteger('category_id'); bu foreingId ile eş deger 7.x versiyonda geldi foreing key
           // $table->integer('category_id')->unsigned; boylede olur.
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->integer('hit')->default(0);
          $table->integer('status')->default(0)->comment('0:pasif 1:aktif');

            $table->string('slug');
            $table->softDeletes();// soft delete table olması içinmifrate
            $table->timestamps();

            $table->foreign('category_id') // baglancak id
                ->references('id') //baglanacak tablodaki id
                ->on('categories') // baglanacak tablo
                -> onDelete('cascade'); // category bulanan bir category sildiğimizde yazılarda o categoryd bulunan yazılar siliniyor.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
