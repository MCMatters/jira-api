<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Project
 *
 * @package McMatters\JiraApi\Resources
 */
class Project extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('project', ['query' => $query])->json();
    }

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
            ->post('project', ['json' => $body, 'headers' => $headers])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function search(array $query = []): array
    {
        return $this->httpClient
            ->get('project/search', ['query' => $query])
            ->json();
    }

    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function types(): array
    {
        return $this->httpClient->get('project/type')->json();
    }

    /**
     * @param string $typeKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getType(string $typeKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/type/{typeKey}', $typeKey))
            ->json();
    }

    /**
     * @param string $typeKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getAccessibleType(string $typeKey): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('project/type/{typeKey}/accessible', $typeKey)
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('project/{idOrKey}', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     * @param array $query
     * @param array $headers
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(
        string $idOrKey,
        array $body,
        array $query = [],
        array $headers = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl('project/{idOrKey}', $idOrKey),
                ['json' => $body, 'query' => $query, 'headers' => $headers]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return bool
     */
    public function delete(string $idOrKey): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('project/{idOrKey}', $idOrKey))
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     *
     * @return bool
     */
    public function updateAvatar(string $idOrKey, array $body): bool
    {
        return HttpStatusCode::OK === $this->httpClient
            ->put(
                $this->encodeUrl('project/{idOrKey}/avatar', $idOrKey),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param string $avatarId
     *
     * @return bool
     */
    public function deleteAvatar(string $idOrKey, string $avatarId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'project/{idOrKey}/avatar/{avatarId}',
                    [$idOrKey, $avatarId]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param resource|string $content
     * @param string $imageType
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createAvatar(
        string $idOrKey,
        $content,
        string $imageType,
        array $query = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('project/{idOrKey}/avatar2', $idOrKey),
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
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function avatars(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/{idOrKey}/avatars', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function components(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('project/{idOrKey}/component', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function allComponents(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/{idOrKey}/components', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function properties(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/{idOrKey}/properties', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $propertyKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getProperty(string $idOrKey, string $propertyKey): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'project/{idOrKey}/properties/{propertyKey}',
                    [$idOrKey, $propertyKey]
                )
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $propertyKey
     * @param array $body
     *
     * @return int
     */
    public function setProperty(
        string $idOrKey,
        string $propertyKey,
        array $body
    ): int {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'project/{idOrKey}/properties/{propertyKey}',
                    [$idOrKey, $propertyKey]
                ),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param string $propertyKey
     *
     * @return bool
     */
    public function deleteProperty(string $idOrKey, string $propertyKey): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'project/{idOrKey}/properties/{propertyKey}',
                    [$idOrKey, $propertyKey]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function roles(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/{idOrKey}/role', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $roleId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getRole(string $idOrKey, string $roleId): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'project/{idOrKey}/role/{roleId}',
                    [$idOrKey, $roleId]
                )
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $roleId
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function setActorsForRole(
        string $idOrKey,
        string $roleId,
        array $body
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'project/{idOrKey}/role/{roleId}',
                    [$idOrKey, $roleId]
                ),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $roleId
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function addActorsToRole(
        string $idOrKey,
        string $roleId,
        array $body
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'project/{idOrKey}/role/{roleId}',
                    [$idOrKey, $roleId]
                ),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $roleId
     * @param array $query
     *
     * @return bool
     */
    public function deleteActorsFromRole(
        string $idOrKey,
        string $roleId,
        array $query = []
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'project/{idOrKey}/role/{roleId}',
                    [$idOrKey, $roleId]
                ),
                ['query' => $query]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function roleDetails(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/{idOrKey}/roledetails', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function statuses(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/{idOrKey}/statuses', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $typeKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateType(string $idOrKey, string $typeKey): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'project/{idOrKey}/type/{typeKey}',
                    [$idOrKey, $typeKey]
                )
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function versions(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('project/{idOrKey}/version', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function allVersions(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('project/{idOrKey}/versions', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function issueSecurityScheme(string $idOrKey): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'project/{idOrKey}/issuesecuritylevelscheme',
                    $idOrKey
                )
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function notificationScheme(
        string $idOrKey,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'project/{idOrKey}/notificationscheme',
                    $idOrKey
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function permissionScheme(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'project/{idOrKey}/permissionscheme',
                    $idOrKey
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function assignPermissionScheme(
        string $idOrKey,
        array $body,
        array $query = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'project/{idOrKey}/permissionscheme',
                    $idOrKey
                ),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function issueSecurityLevels(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('project/{idOrKey}/securitylevel', $idOrKey))
            ->json();
    }
}
