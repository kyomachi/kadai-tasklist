<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration

/*
class CreateMessagesTable extends Migration についてはあまり気にする必要はないでしょう。
Migration クラスを extends （継承） したクラスを生成しています。

Migration クラス自体も特に何かをするクラスでもないので、気にするほどでもありません。

また、 use Illuminate\Database\Migrations\Migration; の名前空間 (Illuminate\Database\Migrations\ ) についても特に気にする必要はないでしょう。 
Laravel の名前空間のトップには Illuminate が付いていることだけ覚えておけば問題ありません。
*/
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');  // content カラム追加
                                        // down() は messages テーブルを削除するだけなので、修正は不要。
            $table->timestamps();
        });
    }

/*
up() はテーブルを更新するときに実行されます。 
up() 内では Schema::create('messages', function (Blueprint $table) { ... } とコーディングされており、
接続している MySQL データベース (tasklist) に tasks テーブルを作成し、作成すべきカラムも指定しています。

現状は、id カラムと timestamp（ created_at カラムと updated_at カラムになるもの）しか指定されていません。
*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
/*
テーブルの更新を戻す方向 (up()と逆方向)も定義されており、それが down() です。 

down() では Schema::dropIfExists('tasks'); とコーディングされており、
その名の通り tasks テーブルが存在するならば、 drop(削除) するということです。 

down() は更新を戻すとき(php artisan migrate:reset など)に実行されます。
*/
}

/*
また、 database/migrations/ フォルダの中には

・2014_10_12_000000_create_users_table.php
・2014_10_12_100000_create_password_resets_table.php

                            というファイルが予め生成されています。

これらはそのファイル名が示す通り、 

・users テーブルの作成
・password_resets テーブルの作成

                            のためのマイグレーションファイルです。

これらは Laravel が予めログイン認証のために作成しているもので、
今回作成するタスク管理アプリでは使用しません。

ログインに関しては Twitter クローンのレッスンで扱います。
*/