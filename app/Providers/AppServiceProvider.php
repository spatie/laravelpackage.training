<?php

namespace App\Providers;

use App\Support\Vimeo\Vimeo;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Model::unguard();

        app()->singleton(Vimeo::class, function () {
            return new Vimeo(new Client([
                'headers' => [
                    'Authorization' => 'Bearer '.config('services.vimeo.access'),
                ]
            ]));
        });

        Blade::component('app.components.buyButton', 'buy-button');

        Blade::directive('markdown', function () {
            return "<?php echo (new \League\CommonMark\CommonMarkConverter())->convertToHtml(<<<HEREDOC";
        });

        Blade::directive('endmarkdown', function () {
            return "HEREDOC); ?>";
        });
    }
}
