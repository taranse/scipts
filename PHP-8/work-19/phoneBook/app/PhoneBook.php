<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    public static function getList($whereKey = null, $whereValue = null)
    {
        if ($whereKey and $whereValue) {
            return DB::table("phone-book")->where($whereKey, $whereValue)->get();
        }
        return DB::table("phone-book")->get();
    }

    public static function get($whereKey = null, $whereValue = null)
    {
        if ($whereKey and $whereValue) {
            return DB::table('phone-book')->where($whereKey, $whereValue)->first();
        }
        return DB::table('phone-book')->first();
    }

    public static function deleteRow($whereKey, $whereValue)
    {
        return DB::table('phone-book')->where($whereKey, $whereValue)->delete();
    }

    public static function addRow($insert)
    {
        DB::table('phone-book')->insert($insert);
    }

    public static function updateRow($whereKey, $whereValue, $update)
    {
        DB::table('phone-book')->where($whereKey, $whereValue)->update($update);
    }
}
