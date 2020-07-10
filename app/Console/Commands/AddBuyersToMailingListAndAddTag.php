<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AddBuyersToMailingListAndAddTag extends Command
{
    protected $signature = 'mailcoach:add-and-tag-buyers';

    protected $description = 'Tag all subscriber that bought mailcoach';

    public function handle()
    {
        $this->info('Tagging subscribers...');

        User::cursor()
            ->each(function (User $user) {
                $this->addBoughMailCoachTag($user);
            });

        $this->info('All done!');
    }

    protected function addBoughMailCoachTag(User $user): void
    {
        if ($user->purchases()->count() === 0) {
            return;
        }

        Http::post('https://spatie.be/mailcoach/subscribe/4af46b59-3784-41a5-9272-6da31afa3a02', [
            'email' => $user->email,
            'tags' => 'laravelpackage-training;bought-course',
        ]);

        $this->info('Add bought tag to ' . $user->email);
    }
}
