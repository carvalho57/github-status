<?php

namespace GithubStatus;

class CurlHelper
{
    public function get($uri): Response
    {
        try {
            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $uri);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);
            $statusCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

            if (!empty(curl_error($handle))) {
                throw new \Exception(curl_error($handle), curl_errno($handle));
            }
        } finally {
            curl_close($handle);
        }

        $response = new Response((int) $statusCode, $response);
        return $response;
    }
}
