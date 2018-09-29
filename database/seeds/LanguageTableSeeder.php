<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language_code_arr = ["AB","AA","AF","SQ","AM","AR","HY","AS","AY","AZ","BA","EU","BN","DZ","BH","BI","BR","BG","MY","BE","KM","CA","ZH","CO","HR","CS","DA","NL","EN","EO","ET","FO","FJ","FI","FR","FY","GD","GL","KA","DE","EL","KL","GN","GU","HA","IW","HI","HU","IS","IN","IA","IE","IK","GA","IT","JA","JW","KN","KS","KK","RW","KY","RN","KO","KU","LO","LA","LV","LN","LT","MK","MG","MS","ML","MT","MI","MR","MO","MN","NA","NE","NO","OC","OR","OM","PS","FA","PL","PT","PA","QU","RM","RO","RU","SM","SG","SA","SR","SH","ST","TN","SN","SD","SI","SS","SK","SL","SO","ES","SU","SW","SV","TL","TG","TA","TT","TE","TH","BO","TI","TO","TS","TR","TK","TW","UK","UR","UZ","VI","VO","CY","WO","XH","JI","YO","ZU"];

        $faker = Faker::create();
        DB::table('languages')->truncate();
        foreach ($language_code_arr AS $key=>$val) {
            DB::table('languages')->insert([
                'code' => $val
            ]);
        }
    }
}
