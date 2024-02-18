<?php

namespace GithubStatus\Helper;

use Symfony\Component\DomCrawler\Crawler;

class GithubStatusExtract
{
    public function __construct(private Crawler $crawler)
    {
    }

    public function getComponents(string $html): array
    {
        $this->crawler->addHtmlContent($html);

        $components = $this->crawler
            ->filter('div.components-container > div.component-container')
            ->each(function (Crawler $node, $i) {
                $name = $node->filter('span.name')->text();
                $description = '';

                if ($node->filter('span.tooltip-base.tool')->count() > 0) {
                    $description = $node->filter('span.tooltip-base.tool')->attr('title') ;
                }

                $status = $node->children()->attr('data-component-status');

                return [
                    'name' => $name,
                    'description' => $description,
                    'status' => $status,
                ];
            });

        return $components;
    }
}
