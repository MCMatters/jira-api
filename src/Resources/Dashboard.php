<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Dashboard
 *
 * @package McMatters\JiraApi\Resources
 */
class Dashboard extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('dashboard', ['query' => $query])->json();
    }

    /**
     * @param string $id
     * @param string $itemId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function itemProperties(string $id, string $itemId): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'dashboard/{id}/items/{itemId}/properties',
                    [$id, $itemId]
                )
            )
            ->json();
    }

    /**
     * @param string $id
     * @param string $itemId
     * @param string $propertyKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getItemProperty(
        string $id,
        string $itemId,
        string $propertyKey
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'dashboard/{id}/items/{itemId}/properties/{propertyKey}',
                    [$id, $itemId, $propertyKey]
                )
            )
            ->json();
    }

    /**
     * @param string $id
     * @param string $itemId
     * @param string $propertyKey
     * @param string $value
     *
     * @return int
     */
    public function setItemProperty(
        string $id,
        string $itemId,
        string $propertyKey,
        string $value
    ): int {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'dashboard/{id}/items/{itemId}/properties/{propertyKey}',
                    [$id, $itemId, $propertyKey]
                ),
                ['json' => $value]
            )
            ->getStatusCode();
    }

    /**
     * @param string $id
     * @param string $itemId
     * @param string $propertyKey
     *
     * @return bool
     */
    public function deleteItemProperty(
        string $id,
        string $itemId,
        string $propertyKey
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'dashboard/{id}/items/{itemId}/properties/{propertyKey}',
                    [$id, $itemId, $propertyKey]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('dashboard/{id}', $id))
            ->json();
    }
}
