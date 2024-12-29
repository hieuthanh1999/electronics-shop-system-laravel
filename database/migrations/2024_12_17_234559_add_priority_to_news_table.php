<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->string('title'); // Tiêu đề của tin tức
            $table->text('description'); // Mô tả của tin tức
            $table->integer('priority')->default(0); // Độ ưu tiên (có thể là 0 hoặc 1)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('news'); // Nếu muốn rollback migration, bảng này sẽ bị xóa
    }

};
