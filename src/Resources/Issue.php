<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Issue
 *
 * @package McMatters\JiraApi\Resources
 */
class Issue extends AbstractResource
{
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
            ->post('issue', ['json' => $body, 'query' => $query])
            ->json();
    }

    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function bulkCreate(array $body): array
    {
        return $this->httpClient
            ->post('issue/bulk', ['json' => $body])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getCreateMeta(array $query = []): array
    {
        return $this->httpClient
            ->get('issue/createmeta', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getPicker(array $query = []): array
    {
        return $this->httpClient
            ->get('issue/picker', ['query' => $query])
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
                $this->encodeUrl('issue/{idOrKey}', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     * @param array $query
     *
     * @return bool
     */
    public function update(
        string $idOrKey,
        array $body,
        array $query = []
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->put(
                $this->encodeUrl('issue/{idOrKey}', $idOrKey),
                ['json' => $body, 'query' => $query]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return bool
     */
    public function delete(string $idOrKey, array $query = []): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl('issue/{idOrKey}', $idOrKey),
                ['query' => $query]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     *
     * @return bool
     */
    public function assign(string $idOrKey, array $body): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->put(
                $this->encodeUrl('issue/{idOrKey}/assignee', $idOrKey),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param string $fileName
     * @param resource|string $content
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function addAttachment(
        string $idOrKey,
        string $fileName,
        $content
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('issue/{idOrKey}/attachments', $idOrKey),
                [
                    'form' => [
                        [
                            'name' => 'file',
                            'contents' => $content,
                            'filename' => $fileName,
                        ],
                    ],
                    'headers' => [
                        'X-Atlassian-Token' => 'no-check',
                    ],
                ]
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
    public function changelog(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('issue/{idOrKey}/changelog', $idOrKey),
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
    public function comments(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('issue/{idOrKey}/comment', $idOrKey),
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
    public function addComment(
        string $idOrKey,
        array $body,
        array $query = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('issue/{idOrKey}/comment', $idOrKey),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $commentId
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getComment(
        string $idOrKey,
        string $commentId,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'issue/{idOrKey}/comment/{commentId}',
                    [$idOrKey, $commentId]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $commentId
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateComment(
        string $idOrKey,
        string $commentId,
        array $body,
        array $query = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'issue/{idOrKey}/comment/{commentId}',
                    [$idOrKey, $commentId]
                ),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $commentId
     *
     * @return bool
     */
    public function deleteComment(string $idOrKey, string $commentId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'issue/{idOrKey}/comment/{commentId}',
                    [$idOrKey, $commentId]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getEditMeta(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('issue/{idOrKey}/editmeta', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     *
     * @return bool
     */
    public function notify(string $idOrKey, array $body): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->post(
                $this->encodeUrl('issue/{idOrKey}/notify', $idOrKey),
                ['json' => $body]
            )
            ->getStatusCode();
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
            ->get(
                $this->encodeUrl('issue/{issueIdOrKey}/properties', $idOrKey)
            )
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
                    'issue/{idOrKey}/properties/{propertyKey}',
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
                    'issue/{idOrKey}/properties/{propertyKey}',
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
                    'issue/{idOrKey}/properties/{propertyKey}',
                    [$idOrKey, $propertyKey]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function remoteLinks(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('issue/{idOrKey}/remotelink', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createOrUpdateRemoteLink(
        string $idOrKey,
        array $body
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('/issue/{idOrKey}/remotelink', $idOrKey),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return bool
     */
    public function deleteRemoteLinkByGlobalId(
        string $idOrKey,
        array $query
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl('issue/{idOrKey}/remotelink', $idOrKey),
                ['query' => $query]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param string $linkId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getRemoteLink(string $idOrKey, string $linkId): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'issue/{idOrKey}/remotelink/{linkId}',
                    [$idOrKey, $linkId]
                )
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $linkId
     * @param array $body
     *
     * @return bool
     */
    public function updateRemoteLink(
        string $idOrKey,
        string $linkId,
        array $body
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->put(
                $this->encodeUrl(
                    'issue/{idOrKey}/remotelink/{linkId}',
                    [$idOrKey, $linkId]
                ),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param string $linkId
     *
     * @return bool
     */
    public function deleteRemoteLink(string $idOrKey, string $linkId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'issue/{idOrKey}/remotelink/{linkId}',
                    [$idOrKey, $linkId]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function transitions(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('issue/{idOrKey}/transitions', $idOrKey),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     *
     * @return bool
     */
    public function doTransition(string $idOrKey, array $body): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->post(
                $this->encodeUrl('issue/{idOrKey}/transitions', $idOrKey),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function votes(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('issue/{idOrKey}/votes', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return bool
     */
    public function addVote(string $idOrKey): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->post($this->encodeUrl('issue/{idOrKey}/votes', $idOrKey))
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     *
     * @return bool
     */
    public function deleteVote(string $idOrKey): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('issue/{idOrKey}/votes', $idOrKey))
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function watchers(string $idOrKey): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('issue/{idOrKey}/watchers', $idOrKey))
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param array $body
     * @param array $headers
     *
     * @return bool
     */
    public function addWatcher(
        string $idOrKey,
        array $body,
        array $headers = []
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->post(
                $this->encodeUrl('issue/{idOrKey}/watchers', $idOrKey),
                ['json' => $body, 'headers' => $headers]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     * @param array $headers
     *
     * @return bool
     */
    public function deleteWatcher(
        string $idOrKey,
        array $query = [],
        array $headers = []
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl('issue/{idOrKey}/watchers', $idOrKey),
                ['query' => $query, 'headers' => $headers]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function worklogs(string $idOrKey, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('issue/{idOrKey}/worklog', $idOrKey),
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
    public function addWorklog(string $idOrKey, array $body, array $query): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('issue/{idOrKey}/worklog', $idOrKey),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $worklogId
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getWorklog(
        string $idOrKey,
        string $worklogId,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'issue/{idOrKey}/worklog/{worklogId}',
                    [$idOrKey, $worklogId]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $worklogId
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateWorklog(
        string $idOrKey,
        string $worklogId,
        array $body,
        array $query = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'issue/{idOrKey}/worklog/{worklogId}',
                    [$idOrKey, $worklogId]
                ),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $worklogId
     * @param array $query
     *
     * @return bool
     */
    public function deleteWorklog(
        string $idOrKey,
        string $worklogId,
        array $query = []
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'issue/{idOrKey}/worklog/{worklogId}',
                    [$idOrKey, $worklogId]
                ),
                ['query' => $query]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param string $worklogId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function worklogProperties(
        string $idOrKey,
        string $worklogId
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'issue/{idOrKey}/worklog/{worklogId}/properties',
                    [$idOrKey, $worklogId]
                )
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $worklogId
     * @param string $propertyKey
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getWorklogProperty(
        string $idOrKey,
        string $worklogId,
        string $propertyKey
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'issue/{idOrKey}/worklog/{worklogId}/properties/{propertyKey}',
                    [$idOrKey, $worklogId, $propertyKey]
                )
            )
            ->json();
    }

    /**
     * @param string $idOrKey
     * @param string $worklogId
     * @param string $propertyKey
     * @param array $body
     *
     * @return int
     */
    public function setWorklogProperty(
        string $idOrKey,
        string $worklogId,
        string $propertyKey,
        array $body
    ): int {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'issue/{idOrKey}/worklog/{worklogId}/properties/{propertyKey}',
                    [$idOrKey, $worklogId, $propertyKey]
                ),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param string $idOrKey
     * @param string $worklogId
     * @param string $propertyKey
     *
     * @return bool
     */
    public function deleteWorklogProperty(
        string $idOrKey,
        string $worklogId,
        string $propertyKey
    ): bool {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'issue/{idOrKey}/worklog/{worklogId}/properties/{propertyKey}',
                    [$idOrKey, $worklogId, $propertyKey]
                )
            )
            ->getStatusCode();
    }
}
