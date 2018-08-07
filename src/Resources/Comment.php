<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Comment
 *
 * @package McMatters\JiraApi\Resources
 */
class Comment extends AbstractResource
{
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
                'comment/list',
                ['json' => ['ids' => $ids], 'query' => $query]
            )
            ->json();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function properties(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('comment/{id}/properties', $id))
            ->json();
    }

    /**
     * @param string $id
     * @param string $propertyKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getProperty(string $id, string $propertyKey): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'comment/{id}/properties/{propertyKey}',
                    [$id, $propertyKey]
                )
            )
            ->json();
    }

    /**
     * @param string $id
     * @param string $propertyKey
     * @param string $value
     *
     * @return int
     */
    public function setProperty(
        string $id,
        string $propertyKey,
        string $value
    ): int {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'comment/{id}/properties/{propertyKey}',
                    [$id, $propertyKey]
                ),
                ['json' => $value]
            )
            ->getStatusCode();
    }

    /**
     * @param string $id
     * @param string $propertyKey
     *
     * @return bool
     */
    public function deleteProperty(string $id, string $propertyKey): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'comment/{id}/properties/{propertyKey}',
                    [$id, $propertyKey]
                )
            )
            ->getStatusCode();
    }
}
