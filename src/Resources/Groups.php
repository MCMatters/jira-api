<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Groups
 *
 * @package McMatters\JiraApi\Resources
 */
class Groups extends AbstractResource
{
    /**
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function find(array $query = [], array $headers = []): array
    {
        return $this->httpClient
            ->get('groups/picker', ['query' => $query, 'headers' => $headers])
            ->json();
    }
}
