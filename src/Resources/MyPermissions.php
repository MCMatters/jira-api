<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class MyPermissions
 *
 * @package McMatters\JiraApi\Resources
 */
class MyPermissions extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('mypermissions', ['query' => $query])
            ->json();
    }
}
