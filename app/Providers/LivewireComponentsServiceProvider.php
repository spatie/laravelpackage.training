<?php

namespace App\Providers;

use App\Http\App\Livewire\VideoCompletedButtonComponent;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireComponentsServiceProvider extends ServiceProvider
{
    public function register()
    {
        Livewire::component('video-completed-button', VideoCompletedButtonComponent::class);
    }
}
