<?php

namespace GithubStatus\Controller;

use GithubStatus\Helper\CurlHelper;
use GithubStatus\Helper\GithubStatusExtract;
use Symfony\Component\DomCrawler\Crawler;

class GithubStatusController
{
    public function index()
    {
        ob_start();
        include VIEW_PATH . 'index.php';
        return (string) ob_get_clean();
    }

    public function get()
    {
        $curlHelper = new CurlHelper();
        $response = $curlHelper->get('https://www.githubstatus.com/');
        $html = $response->getBody();

        $githubStatusExtract = new GithubStatusExtract(new Crawler());
        $components = $githubStatusExtract->getComponentsStatus($html);

        echo json_encode($components);
    }
}
