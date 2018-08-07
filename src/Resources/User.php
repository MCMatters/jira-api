<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class User
 *
 * @package McMatters\JiraApi\Resources
 */
class User extends AbstractResource
{
    /**
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(array $query = [], array $headers = []): array
    {
        return $this->httpClient
            ->get('user', ['query' => $query, 'headers' => $headers])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function findAssignableToProjects(array $query = []): array
    {
        return $this->httpClient
            ->get('user/assignable/multiProjectSearch', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function findAssignableToIssues(array $query = []): array
    {
        return $this->httpClient
            ->get('user/assignable/search', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDefaultColumns(
        array $query = [],
        array $headers = []
    ): array {
        return $this->httpClient
            ->get('user/columns', ['query' => $query, 'headers' => $headers])
            ->json();
    }

    /**
     * @param array $body
     * @param array $query
     * @param array $headers
     *
     * @return bool
     */
    public function setDefaultColumns(
        array $body,
        array $query = [],
        array $headers = []
    ): bool {
        return HttpStatusCode::OK === $this->httpClient
            ->put(
                'user/columns',
                ['json' => $body, 'query' => $query, 'headers' => $headers]
            )
            ->getStatusCode();
    }

    /**
     * @param array $query
     * @param array $headers
     *
     * @return bool
     */
    public function resetDefaultColumns(
        array $query = [],
        array $headers = []
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete('user/columns', ['query' => $query, 'headers' => $headers])
            ->getStatusCode();
    }

    /**
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function groups(array $query = [], array $headers = []): array
    {
        return $this->httpClient
            ->get('user/groups', ['query' => $query, 'headers' => $headers])
            ->json();
    }

    /**
     * @param array $permissions
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function findWithPermissions(
        array $permissions,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                'user/permission/search',
                ['query' => ['permissions' => $permissions] + $query]
            )
            ->json();
    }

    /**
     * @param string $keyword
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function findForPicker(string $keyword, array $query = []): array
    {
        return $this->httpClient
            ->get(
                'user/picker',
                ['query' => ['query' => $keyword] + $query]
            )
            ->json();
    }

    /**
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function properties(array $query = [], array $headers = []): array
    {
        return $this->httpClient
            ->get('user/properties', ['query' => $query, 'headers' => $headers])
            ->json();
    }

    /**
     * @param string $propertyKey
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getProperty(
        string $propertyKey,
        array $query = [],
        array $headers = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl('user/properties/{propertyKey}', $propertyKey),
                ['query' => $query, 'headers' => $headers]
            )
            ->json();
    }

    /**
     * @param string $propertyKey
     * @param array $body
     * @param array $query
     * @param array $headers
     *
     * @return int
     */
    public function setProperty(
        string $propertyKey,
        array $body,
        array $query = [],
        array $headers = []
    ): int {
        return $this->httpClient
            ->put(
                $this->encodeUrl('user/properties/{propertyKey}', $propertyKey),
                ['json' => $body, 'query' => $query, 'headers' => $headers]
            )
            ->getStatusCode();
    }

    /**
     * @param string $propertyKey
     * @param array $query
     * @param array $headers
     *
     * @return bool
     */
    public function deleteProperty(
        string $propertyKey,
        array $query = [],
        array $headers = []
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl('user/properties/{propertyKey}', $propertyKey),
                ['query' => $query, 'headers' => $headers]
            )
            ->getStatusCode();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function find(array $query = []): array
    {
        return $this->httpClient
            ->get('user/search', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function findWithBrowsePermission(array $query = []): array
    {
        return $this->httpClient
            ->get('user/viewissue/search', ['query' => $query])
            ->json();
    }
}
