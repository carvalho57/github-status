<?php

use GithubStatus\CurlHelper;
use GithubStatus\GithubStatusExtract;
use Symfony\Component\DomCrawler\Crawler;

require_once 'vendor/autoload.php';

$curlHelper = new CurlHelper();
$response = $curlHelper->get('https://www.githubstatus.com/');

$html = $response->getBody();

$githubStatusExtract = new GithubStatusExtract(new Crawler());
$components = $githubStatusExtract->getComponents($html);

echo json_encode($components, JSON_PRETTY_PRINT);
