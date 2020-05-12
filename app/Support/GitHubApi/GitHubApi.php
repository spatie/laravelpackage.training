<?php

namespace App\Support\GitHubApi;

use Github\Client;

class GitHubApi
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function inviteToMailcoachRepo(string $gitHubUsername)
    {
        $this->client->repo()->collaborators()->add(
            'spatie',
            'laravel-mailcoach',
            $gitHubUsername,
            ['permission' => 'pull']
        );
    }

    public function revokeAccessToMailcoachRepo(string $gitHubUsername)
    {
        $this->client->repo()->collaborators()->remove(
            'spatie',
            'laravel-mailcoach',
            $gitHubUsername,
        );
    }
}
