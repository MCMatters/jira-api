<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Search
 *
 * @package McMatters\JiraApi\Resources
 */
class Search extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function issue(array $query = []): array
    {
        return $this->httpClient->get('search', ['query' => $query])->json();
    }
}
