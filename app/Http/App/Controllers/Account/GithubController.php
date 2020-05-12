<?php

namespace App\Http\App\Controllers\Account;

use App\Support\GitHubApi\GitHubApi;
use Laravel\Socialite\Facades\Socialite;

class GithubController
{
    public function show()
    {
        return view('app.account.github', [
            'user' => auth()->user(),
        ]);
    }

    public function redirectTo()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleCallback(GitHubApi $gitHubApi)
    {
        $authenticatedUser = auth()->user();

        /** @var \Laravel\Socialite\Two\User $gitHubUser */
        $gitHubUser = Socialite::driver('github')->user();

        $authenticatedUser->update([
            'github_username' => $gitHubUser->user['login'],
            'github_id' => $gitHubUser->user['id']
        ]);

        $gitHubApi->inviteToMailcoachRepo($authenticatedUser->github_username);

        return redirect()->route('github');
    }

    public function disconnect()
    {
        auth()->user()->revokeAccessToRepo();

        return back();
    }
}
