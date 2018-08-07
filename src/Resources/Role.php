<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Role
 *
 * @package McMatters\JiraApi\Resources
 */
class Role extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('role')->json();
    }

    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body): array
    {
        return $this->httpClient->post('role', ['json' => $body])->json();
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(int $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('role/{id}', $id))
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(int $id, array $body): array
    {
        return $this->httpClient
            ->put($this->encodeUrl('role/{id}', $id), ['json' => $body])
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function partialUpdate(int $id, array $body): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('role/{id}', $id), ['json' => $body])
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return bool
     */
    public function delete(int $id, array $query = []): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('role/{id}', $id), ['query' => $query])
            ->getStatusCode();
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function defaultActors(int $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('role/{id}/actors', $id))
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function addDefaultActors(int $id, array $body): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('role/{id}/actors', $id), ['json' => $body])
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function deleteDefaultActors(int $id, array $query = []): array
    {
        return $this->httpClient
            ->delete(
                $this->encodeUrl('role/{id}/actors', $id),
                ['query' => $query]
            )
            ->json();
    }
}
