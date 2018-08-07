<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Client;
use const true;
use function preg_replace, rawurlencode;

/**
 * Class AbstractResource
 *
 * @package McMatters\JiraApi\Resources
 */
abstract class AbstractResource
{
    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * AbstractResource constructor.
     *
     * @param string $apiUrl
     * @param string $token
     */
    public function __construct(string $apiUrl, string $token)
    {
        $this->httpClient = new Client([
            'base_uri' => $apiUrl,
            'headers' => [
                'Authorization' => "Basic {$token}",
                'Content-type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'bool_as_string' => true,
        ]);
    }

    /**
     * @param string $url
     * @param mixed $replacements
     *
     * @return string
     */
    protected function encodeUrl(string $url, $replacements = []): string
    {
        foreach ((array) $replacements as $key => $replacement) {
            $url = preg_replace(
                '/{(?<key>\w+)}/',
                rawurlencode($replacement),
                $url,
                1
            );
        }

        return $url;
    }
}
