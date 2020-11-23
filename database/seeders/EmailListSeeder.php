<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Mailcoach\Models\EmailList;

class EmailListSeeder extends Seeder
{
    public function run()
    {
        EmailList::create([
            'name' => 'marketing',
            'requires_confirmation' => false,
        ]);
    }
}
