<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function index() {

        /*
        $sql = "CREATE TABLE test (
            id int PRIMARY KEY AUTO_INCREMENT,
            content varchar(50)
        )";
        DB::statement($sql);
        echo "complete"; 
        */
        /*
        $sql = "INSERT INTO test (content) VALUES (:content)";

        $result = DB::insert($sql, [':content' => 'test']);
        */

        //$result = DB::table('test')
        //    ->get();
        $result = DB::select("SELECT * FROM test WHERE id = :id", [':id' => 4]);

        dd($result);
        //echo "complete"; exit;

    }
}
