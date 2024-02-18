<?php

namespace GithubStatus\Controller;

use GithubStatus\Helper\CurlHelper;
use GithubStatus\Helper\GithubStatusExtract;
use Symfony\Component\DomCrawler\Crawler;

class StatusController
{
    public function get()
    {
        $curlHelper = new CurlHelper();
        $response = $curlHelper->get('https://www.githubstatus.com/');

        $html = $response->getBody();

        $githubStatusExtract = new GithubStatusExtract(new Crawler());
        $components = $githubStatusExtract->getComponents($html);

        echo json_encode($components);
    }
}
