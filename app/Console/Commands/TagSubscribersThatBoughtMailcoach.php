<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Mailcoach\Models\EmailList;
use Spatie\Mailcoach\Models\Subscriber;

class TagSubscribersThatBoughtMailcoach extends Command
{
    protected $signature = 'mailcoach:tag-subscribers';

    protected $description = 'Tag all subscriber that bought mailcoach';

    public function handle()
    {
        $this->info('Tagging subscribers...');

        Subscriber::cursor()
            ->each(function (Subscriber $subscriber) {
                $subscriber->removeTag('bought-mailcoach');
            });

        $emailList = EmailList::where('name', 'Marketing')->first();

        User::cursor()
            ->each(function (User $user) use ($emailList) {
                /** @var Subscriber $subscriber */
                if (!$subscriber = Subscriber::where('email', $user->email)->first()) {
                    $subscriber = Subscriber::createWithEmail($user->email)->skipConfirmation()->subscribeTo($emailList);
                }

                $this->addBoughMailCoachTag($user, $subscriber);
                $this->addGrabbedFreeVideosTag($user, $subscriber);
            });

        $this->info('All done!');
    }

    protected function addBoughMailCoachTag(User $user, Subscriber $subscriber): void
    {
        if ($user->licenses->count() === 0) {
            return;
        }

        $subscriber->addTag('bought-mailcoach');

        $this->info('Add bought tag to ' . $user->email);
    }

    protected function addGrabbedFreeVideosTag(User $user, Subscriber $subscriber): void
    {
        if (! $user->purchases()->where('payment_method', 'free')->first()) {
            return;
        }

        if (! $user->created_at) {
            return;
        }

        if (! $user->created_at->isAfter(Carbon::createFromFormat('Y-m-d H:i:s', '2020-03-16 00:00:00'))) {
            return;
        }

        if (! $user->created_at->isBefore(Carbon::createFromFormat('Y-m-d H:i:s', '2020-03-18 00:00:00'))) {
            return;
        }

        $subscriber->addTag('grabbed-free-videos');

        $this->info('Add free video tag to ' . $user->email);
    }
}
