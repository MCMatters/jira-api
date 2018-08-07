<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class UniversalAvatar
 *
 * @package McMatters\JiraApi\Resources
 */
class UniversalAvatar extends AbstractResource
{
    /**
     * @param string $type
     * @param string $entityId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(string $type, string $entityId): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'universal_avatar/type/{type}/owner/{entityId}',
                    [$type, $entityId]
                )
            )
            ->json();
    }

    /**
     * @param string $type
     * @param string $entityId
     * @param resource|string $content
     * @param string $imageType
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function store(
        string $type,
        string $entityId,
        $content,
        string $imageType,
        array $query = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'universal_avatar/type/{type}/owner/{entityId}',
                    [$type, $entityId]
                ),
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
     * @param string $type
     * @param string $entityId
     * @param string $avatarId
     *
     * @return bool
     */
    public function delete(
        string $type,
        string $entityId,
        string $avatarId
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'universal_avatar/type/{type}/owner/{entityId}/avatar/{avatarId}',
                    [$type, $entityId, $avatarId]
                )
            )
            ->getStatusCode();
    }
}
