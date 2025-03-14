<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Insert some stuff
        DB::table('settings')->insert(
            array(
                'id' => 1,
                'email' => 'admin@example.com',
                'currency_id' => 1,
                'client_id' => Null,
                'invoice_footer' => Null,
                'warehouse_id' => Null,
                'CompanyName' => 'Erka Solutions',
                'CompanyPhone' => '6285137665233',
                'CompanyAdress' => '3618 Abia Martin Drive',
                'footer' => 'Erka Solutions Grup | All Rights Reserved',
                'developed_by' => 'Erka Solutions Grup',
                'app_name' => 'Erka Solutions',
                'logo' => 'logo-default.svg',
                'default_sms_gateway' => 'twilio',
                'default_language' => 'en',
                'symbol_placement' => 'before',
            )
            
        );
    }
}
