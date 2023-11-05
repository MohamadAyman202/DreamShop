<?php

namespace Database\Seeders;

use App\Models\Withdrawal_account;
use Illuminate\Database\Seeder;

class WithdrawalAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'id' => 1,
                'account_number' => '1212334454',
                'account_name' => 'Mohamad Ayman',
                'bank_name' => 'Al Ahly Bank',
                'branch_name' => 'EG',
                'title' => 'Default',
                'default' => 1,
                'admin_id' => 2
            ]
        ];

        foreach ($items as $i) {
            Withdrawal_account::create($i);
        }
    }
}
