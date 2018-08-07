<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class NotificationScheme
 *
 * @package McMatters\JiraApi\Resources
 */
class NotificationScheme extends AbstractResource
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
            ->get('notificationscheme', ['query' => $query])
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('notificationscheme', $id),
                ['query' => $query]
            )
            ->json();
    }
}
