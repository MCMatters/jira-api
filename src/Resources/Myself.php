<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Myself
 *
 * @package McMatters\JiraApi\Resources
 */
class Myself extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(array $query = []): array
    {
        return $this->httpClient->get('myself', ['query' => $query])->json();
    }
}
