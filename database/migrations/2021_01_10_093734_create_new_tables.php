<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('slide', function (Blueprint $table) {
            $table->increments("id");
            $table->string("images",50);
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");
            $table->string("full_name",50);
            $table->string("email",50);
            $table->string("password",50);
            $table->string("phone",50);
            $table->string("address",50);
            $table->timestamps();
        });
        Schema::create('type_products', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name",50);
            $table->text("description");
            $table->string("image",50);
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name",50);
            $table->integer("id_type")->unsigned();
            $table->text("description");
            $table->float("unit_price");
            $table->float("promotion_price");
            $table->string("unit",50);
            $table->tinyinteger("new")->unsigned();
            $table->string("image",50);
            $table->foreign("id_type")->references("id")->on("type_products");
            $table->timestamps();
        });
        Schema::create('customer', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name",50);
            $table->string("gender",50);
            $table->string("email",50);
            $table->string("address",50);
            $table->string("phone_number",50);
            $table->string("note",50);
            $table->timestamps();
        });
        Schema::create('bills', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_customer")->unsigned();
            $table->foreign("id_customer")->references("id")->on("customer");
            $table->date("date_order");
            $table->float("total");
            $table->string("payment",50);
            $table->string("note",50);
            $table->timestamps();
        });
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_bill")->unsigned();
            $table->integer("id_product")->unsigned();
            $table->integer("quantity");
            $table->double ("unit_price");
            $table->foreign("id_bill")->references("id")->on("bills");
            $table->foreign("id_product")->references("id")->on("products");
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
        Schema::dropIfExists('new_tables');
    }
}
