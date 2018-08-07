<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Auditing
 *
 * @package McMatters\JiraApi\Resources
 */
class Auditing extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function records(array $query = []): array
    {
        return $this->httpClient
            ->get('auditing/record', ['query' => $query])
            ->json();
    }
}
