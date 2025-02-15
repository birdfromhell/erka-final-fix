<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	// Insert some stuffs
        DB::table('payment_methods')->insert(
            array([
                'id'           => 1,
                'title'        => 'Other Payment Method',
                'is_default'   => 0,

            ],
            [
                'id'           => 2,
                'title'        => 'Kartu Kredit',
                'is_default'   => 1,

            ],
            [
                'id'           => 3,
                'title'        => 'Bank transfer',
                'is_default'   => 0,

            ],
            [
                'id'           => 4,
                'title'        => 'Kartu Debit',
                'is_default'   => 1,

            ],
            [
                'id'           => 5,
                'title'        => 'E-Wallet',
                'is_default'   => 0,

            ],
            [
                'id'           => 6,
                'title'        => 'Tunai',
                'is_default'   => 0,

            ],
            )
            
        );
    }
}
