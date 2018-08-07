<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Worklog
 *
 * @package McMatters\JiraApi\Resources
 */
class Worklog extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDeletedIds(array $query = []): array
    {
        return $this->httpClient
            ->get('worklog/deleted', ['query' => $query])
            ->json();
    }

    /**
     * @param array $ids
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getByIds(array $ids, array $query = []): array
    {
        return $this->httpClient
            ->post(
                'worklog/list',
                ['json' => ['ids' => $ids], 'query' => $query]
            )
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getModifiedIds(array $query = []): array
    {
        return $this->httpClient
            ->get('worklog/updated', ['query' => $query])
            ->json();
    }
}
