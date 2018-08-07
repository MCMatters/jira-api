<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class PermissionScheme
 *
 * @package McMatters\JiraApi\Resources
 */
class PermissionScheme extends AbstractResource
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
            ->get('permissionscheme', ['query' => $query])
            ->json();
    }

    /**
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body, array $query = []): array
    {
        return $this->httpClient
            ->post('permissionscheme', ['json' => $body, 'query' => $query])
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
                $this->encodeUrl('permissionscheme/{id}', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(int $id, array $body, array $query = []): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('permissionscheme/{id}', $id),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('permissionscheme/{id}', $id))
            ->getStatusCode();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function grants(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('permissionscheme/{id}/permission', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createGrant(int $id, array $body, array $query = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('permissionscheme/{id}/permission', $id),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param int $permissionId
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getGrant(
        int $id,
        int $permissionId,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'permissionscheme/{id}/permission/{permissionId}',
                    [$id, $permissionId]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param int $permissionId
     *
     * @return bool
     */
    public function deleteGrant(int $id, int $permissionId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'permissionscheme/{id}/permission/{permissionId}',
                    [$id, $permissionId]
                )
            )
            ->getStatusCode();
    }
}
