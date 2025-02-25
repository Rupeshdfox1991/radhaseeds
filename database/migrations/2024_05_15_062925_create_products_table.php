<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('pro_cat_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code')->nullable();
            $table->string('image');
            $table->string('alt_tag')->nullable();
            $table->string('title_tag')->nullable();
            $table->text('product_desc')->nullable();
            $table->string('related_product_id')->nullable();
            $table->enum('for_home', ['Yes', 'No'])->default('No');
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('page_schema')->nullable();
            $table->text('og_code')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('products');
    }
}