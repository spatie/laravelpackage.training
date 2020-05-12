<?php

namespace App\Http\Front\Controllers;

use App\Models\DocumentationPage;
use App\Support\CommonMark\CommonMark;
use App\Support\Documentation\AppDocsNavigationV1;
use App\Support\Documentation\AppDocsNavigationV2;
use App\Support\Documentation\Navigation;
use App\Support\Documentation\PackageDocsNavigationV1;
use App\Support\Documentation\PackageDocsNavigationV2;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class DocumentationController
{
    public function __invoke()
    {
        $navigation = collect([
            AppDocsNavigationV1::class,
            AppDocsNavigationV2::class,
            PackageDocsNavigationV1::class,
            PackageDocsNavigationV2::class,
        ])
            ->map(fn (string $class) => app($class))
            ->first(fn (Navigation $navigation) => $navigation->sectionSlug() === request()->segment(3)
                && $navigation->version() === request()->segment(2));

        if (!$navigation) {
            abort(404);
        }

        $pageProperties = $this->getPageProperties($navigation);

        return view('front.docs.index')->with($pageProperties);
    }

    private function getPageProperties(Navigation $navigation): array
    {
        $documentationPage = DocumentationPage::where('key', request()->path())->firstOrFail();

        $document = YamlFrontMatter::parse($documentationPage->content);
        $pageProperties = $document->matter();
        $pageProperties['pagePath'] = request()->path();

        $pageProperties['content'] = CommonMark::convertToHtml($document->body());
        $pageProperties['tableOfContents'] = $this->extractTableOfContents($pageProperties['content']);

        $pageProperties['previousUrl'] = $navigation->getPreviousPage();
        $pageProperties['nextUrl'] = $navigation->getNextPage();

        $pageProperties['og'] = [];

        $pageProperties['claim'] = 'Run your own newsletter engine';

        $pageProperties['navigation'] = $navigation;

        $pageProperties['gitHubUrl'] = $this->getGitHubUrl();

        return $pageProperties;
    }

    private function extractTableOfContents(string $document): array
    {
        $matches = [];

        preg_match_all('/<h2 id="([^"]+)" class="group">([^<]+)/', $document, $matches);

        return array_combine($matches[1], $matches[2]);
    }

    protected function getGitHubUrl(): string
    {
        $version = request()->segment(2);
        $branch = $version;

        if ($version === 'v2') {
            $branch  = 'master';
        }

        return "https://github.com/spatie/laravel-mailcoach-docs/edit/{$branch}/" . str_replace("{$version}/", '', request()->path()) . '.md';
    }
}
