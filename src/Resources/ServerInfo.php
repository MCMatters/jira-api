<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class ServerInfo
 *
 * @package McMatters\JiraApi\Resources
 */
class ServerInfo extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(): array
    {
        return $this->httpClient->get('serverInfo')->json();
    }
}
