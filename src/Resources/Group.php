<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Group
 *
 * @package McMatters\JiraApi\Resources
 */
class Group extends AbstractResource
{
    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body): array
    {
        return $this->httpClient->post('group', ['json' => $body])->json();
    }

    /**
     * @param string $name
     * @param array $query
     *
     * @return bool
     */
    public function delete(string $name, array $query = []): bool
    {
        return HttpStatusCode::OK === $this->httpClient
            ->delete('group', ['query' => ['groupname' => $name] + $query])
            ->getStatusCode();
    }

    /**
     * @param string $name
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function users(string $name, array $query = []): array
    {
        return $this->httpClient
            ->get(
                'group/member',
                ['query' => ['groupname' => $name] + $query]
            )
            ->json();
    }

    /**
     * @param string $name
     * @param array $body
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function addUser(
        string $name,
        array $body,
        array $headers = []
    ): array {
        return $this->httpClient
            ->post(
                'group/user',
                [
                    'query' => ['groupname' => $name],
                    'json' => $body,
                    'headers' => $headers,
                ]
            )
            ->json();
    }

    /**
     * @param string $name
     * @param array $query
     * @param array $headers
     *
     * @return bool
     */
    public function removeUser(
        string $name,
        array $query = [],
        array $headers = []
    ): bool {
        return HttpStatusCode::OK === $this->httpClient
            ->delete(
                'group/user',
                [
                    'query' => ['groupname' => $name] + $query,
                    'headers' => $headers,
                ]
            )
            ->getStatusCode();
    }
}
