<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Version
 *
 * @package McMatters\JiraApi\Resources
 */
class Version extends AbstractResource
{
    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body): array
    {
        return $this->httpClient->post('version', ['json' => $body])->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function remoteLinks(array $query = []): array
    {
        return $this->httpClient
            ->get('version/remotelink', ['query' => $query])
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
            ->get($this->encodeUrl('version/{id}', $id), ['query' => $query])
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
            ->put($this->encodeUrl('version/{id}', $id), ['json' => $body])
            ->json();
    }

    /**
     * @param string $id
     * @param string $moveIssuesToId
     *
     * @return bool
     */
    public function merge(string $id, string $moveIssuesToId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->put(
                $this->encodeUrl(
                    'version/{id}/mergeto/{moveIssuesToId}',
                    [$id, $moveIssuesToId]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function move(string $id, array $body): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('version/{id}/move', $id),
                ['json' => $body]
            )
            ->json();
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
            ->get($this->encodeUrl('version/{id}/relatedIssueCounts', $id))
            ->json();
    }

    /**
     * @param string $id
     * @param array $body
     *
     * @return bool
     */
    public function deleteAndSwap(string $id, array $body): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->post(
                $this->encodeUrl('version/{id}/removeAndSwap', $id),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function unresolvedIssueCount(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('version/{id}/unresolvedIssueCount', $id))
            ->json();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function remoteLinksByVersionId(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('version/{id}/remotelink', $id))
            ->json();
    }

    /**
     * @param string $id
     * @param array $body
     *
     * @return string
     */
    public function createOrUpdateRemoteLink(string $id, array $body): string
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('version/{id}/remotelink', $id),
                ['json' => $body]
            )
            ->getHeader('location');
    }

    /**
     * @param string $id
     *
     * @return bool
     */
    public function deleteRemoteLinks(string $id): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('version/{id}/remotelink', $id))
            ->getStatusCode();
    }

    /**
     * @param string $id
     * @param string $globalId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getRemoteLink(string $id, string $globalId): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'version/{id}/remotelink/{globalId}',
                    [$id, $globalId]
                )
            )
            ->json();
    }

    /**
     * @param string $id
     * @param string $globalId
     * @param array $body
     *
     * @return string
     */
    public function createOrUpdateRemoteLinkWithGlobalId(
        string $id,
        string $globalId,
        array $body
    ): string {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'version/{id}/remotelink/{globalId}',
                    [$id, $globalId]
                ),
                ['json' => $body]
            )
            ->getHeader('location');
    }

    /**
     * @param string $id
     * @param string $globalId
     *
     * @return bool
     */
    public function deleteRemoteLink(string $id, string $globalId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'version/{id}/remotelink/{globalId}',
                    [$id, $globalId]
                )
            )
            ->getStatusCode();
    }
}
