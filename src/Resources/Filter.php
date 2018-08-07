<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;
use McMatters\Ticl\Exceptions\RequestException;

/**
 * Class Filter
 *
 * @package McMatters\JiraApi\Resources
 */
class Filter extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('filter', ['query' => $query])->json();
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
            ->post('filter', ['json' => $body, 'query' => $query])
            ->json();
    }

    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDefaultShareScope(): array
    {
        return $this->httpClient->get('filter/defaultShareScope')->json();
    }

    /**
     * @param string $scope
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function setDefaultShareScope(string $scope): array
    {
        return $this->httpClient
            ->put('filter/defaultShareScope', ['json' => ['scope' => $scope]])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getFavourites(array $query = []): array
    {
        return $this->httpClient
            ->get('filter/favourite', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getMy(array $query = []): array
    {
        return $this->httpClient->get('filter/my', ['query' => $query])->json();
    }

    /**
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function search(array $query, array $headers = []): array
    {
        return $this->httpClient
            ->get('filter/search', ['query' => $query, 'headers' => $headers])
            ->json();
    }

    /**
     * @param string $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $id, array $query = []): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('filter/{id}', $id), ['query' => $query])
            ->json();
    }

    /**
     * @param string $id
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(string $id, array $body, array $query = []): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('filter/{id}', $id),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param string $id
     *
     * @return bool
     */
    public function delete(string $id): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('filter/{id}', $id))
            ->getStatusCode();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function columns(string $id): array
    {
        try {
            return $this->httpClient
                ->get($this->encodeUrl('filter/{id}/columns', $id))
                ->json();
        } catch (RequestException $exception) {
            return [];
        }
    }

    /**
     * @param string $id
     * @param string $columns
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function setColumns(string $id, string $columns): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('filter/{id}/columns', $id),
                ['json' => ['columns' => $columns]]
            )
            ->json();
    }

    /**
     * @param string $id
     *
     * @return bool
     */
    public function resetColumns(string $id): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('filter/{id}/columns', $id))
            ->getStatusCode();
    }

    /**
     * @param string $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function addAsFavorite(string $id, array $query = []): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('filter/{id}/favourite', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function removeAsFavorite(string $id, array $query = []): array
    {
        return $this->httpClient
            ->delete(
                $this->encodeUrl('filter/{id}/favourite', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function sharePermissions(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('filter/{id}/permission', $id))
            ->json();
    }

    /**
     * @param string $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function addSharePermission(string $id, array $body): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('filter/{id}/permission', $id),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param string $id
     * @param int $permissionId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getSharePermission(string $id, int $permissionId): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'filter/{id}/permission/{permissionId}',
                    [$id, $permissionId]
                )
            )
            ->json();
    }

    /**
     * @param string $id
     * @param int $permissionId
     *
     * @return bool
     */
    public function deleteSharePermission(string $id, int $permissionId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'filter/{id}/permission/{permissionId}',
                    [$id, $permissionId]
                )
            )
            ->getStatusCode();
    }
}
