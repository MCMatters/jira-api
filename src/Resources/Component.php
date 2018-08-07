<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Component
 *
 * @package McMatters\JiraApi\Resources
 */
class Component extends AbstractResource
{
    /**
     * @param array $body
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body, array $headers = []): array
    {
        return $this->httpClient
            ->post('component', ['json' => $body, 'headers' => $headers])
            ->json();
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
            ->get($this->encodeUrl('component/{id}', $id))
            ->json();
    }

    /**
     * @param string $id
     * @param array $body
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(string $id, array $body, array $headers = []): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('component/{id}', $id),
                ['json' => $body, 'headers' => $headers]
            )
            ->json();
    }

    /**
     * @param string $id
     * @param array $query
     *
     * @return bool
     */
    public function delete(string $id, array $query = []): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl('component/{id}', $id),
                ['query' => $query]
            )
            ->getStatusCode();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function relatedIssueCounts(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('component/{id}/relatedIssueCounts', $id))
            ->json();
    }
}
