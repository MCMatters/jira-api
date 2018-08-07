<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class GroupUserPicker
 *
 * @package McMatters\JiraApi\Resources
 */
class GroupUserPicker extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function findUsersAndGroups(array $query = []): array
    {
        return $this->httpClient
            ->get('groupuserpicker', ['query' => $query])
            ->json();
    }
}
