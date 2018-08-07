<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class IssueType
 *
 * @package McMatters\JiraApi\Resources
 */
class IssueType extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('issuetype')->json();
    }

    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body): array
    {
        return $this->httpClient
            ->post('issuetype', ['json' => $body])
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
            ->get($this->encodeUrl('issuetype/{id}', $id))
            ->json();
    }

    /**
     * @param string $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(string $id, array $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('issuetype/{id}', $id),
                ['json' => $body]
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
                $this->encodeUrl('issuetype/{id}', $id),
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
    public function alternatives(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('issuetype/{id}/alternatives', $id))
            ->json();
    }

    /**
     * @param string $id
     * @param resource|string $content
     * @param string $imageType
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createAvatar(
        string $id,
        $content,
        string $imageType,
        array $query = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('issuetype/{id}/avatar2', $id),
                [
                    'binary' => $content,
                    'query' => $query,
                    'headers' => [
                        'X-Atlassian-Token' => 'no-check',
                        'Content-Type' => "image/{$imageType}",
                    ],
                ]
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
            ->get($this->encodeUrl('issuetype/{id}/properties', $id))
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
                    'issuetype/{id}/properties/{propertyKey}',
                    [$id, $propertyKey]
                )
            )
            ->json();
    }

    /**
     * @param string $id
     * @param string $propertyKey
     * @param array $body
     *
     * @return int
     */
    public function setProperty(
        string $id,
        string $propertyKey,
        array $body
    ): int {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'issuetype/{id}/properties/{propertyKey}',
                    [$id, $propertyKey]
                ),
                ['json' => $body]
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
                    'issuetype/{id}/properties/{propertyKey}',
                    [$id, $propertyKey]
                )
            )
            ->getStatusCode();
    }
}
