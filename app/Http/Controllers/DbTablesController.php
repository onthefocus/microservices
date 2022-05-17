<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbTablesController extends Controller
{
    public function getTables() {
        $tables = DB::select("SELECT * FROM information_schema.tables");
        $tables = DB::select("SELECT * FROM pg_catalog.pg_tables
        WHERE schemaname != 'pg_catalog' AND 
            schemaname != 'information_schema'");
        return $tables;
    }

    public function getColumns() {
    
        $tables = DB::select("SELECT * FROM information_schema.columns
        where table_name='quotes'");
        return $tables;
    }

    public function getComments() {
    // https://gist.github.com/alexanderlz/7302623
        $nameSpace = DB::select("SELECT oid FROM pg_catalog.pg_namespace WHERE nspname = 'public'");
        $id = $nameSpace[0]->oid;
        $table = 'quotes';
        
        $tableObj = DB::select("SELECT oid FROM pg_class WHERE relname = '$table' AND relnamespace = '$id'");
        $tableid = $tableObj[0]->oid;
        return $tableid;
    }

}
