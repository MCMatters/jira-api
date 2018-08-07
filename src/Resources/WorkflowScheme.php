<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class WorkflowScheme
 *
 * @package McMatters\JiraApi\Resources
 */
class WorkflowScheme extends AbstractResource
{
    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body): array
    {
        return $this->httpClient
            ->post('workflowscheme', ['json' => $body])
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
                $this->encodeUrl('workflowscheme/{id}', $id),
                ['query' => $query]
            )
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
            ->put(
                $this->encodeUrl('workflowscheme/{id}', $id),
                ['json' => $body]
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
            ->delete($this->encodeUrl('workflowscheme/{id}', $id))
            ->getStatusCode();
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createDraft(int $id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('workflowscheme/{id}/createdraft', $id))
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDefault(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('workflowscheme/{id}/default', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateDefault(int $id, array $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('workflowscheme/{id}/default', $id),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function deleteDefault(int $id, array $query = []): array
    {
        return $this->httpClient
            ->delete(
                $this->encodeUrl('workflowscheme/{id}/default', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDraft(int $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('workflowscheme/{id}/draft', $id))
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createOrUpdateDraft(int $id, array $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('workflowscheme/{id}/draft', $id),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function deleteDraft(int $id): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete($this->encodeUrl('workflowscheme/{id}/draft', $id))
            ->getStatusCode();
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDraftDefault(int $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('workflowscheme/{id}/draft/default', $id))
            ->json();
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateDraftDefault(int $id, array $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('workflowscheme/{id}/draft/default', $id),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function deleteDraftDefault(int $id): array
    {
        return $this->httpClient
            ->delete($this->encodeUrl('workflowscheme/{id}/draft/default', $id))
            ->json();
    }

    /**
     * @param int $id
     * @param string $issueType
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDraftIssueType(int $id, string $issueType): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'workflowscheme/{id}/draft/issuetype/{issueType}',
                    [$id, $issueType]
                )
            )
            ->json();
    }

    /**
     * @param int $id
     * @param string $issueType
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function setDraftIssueType(
        int $id,
        string $issueType,
        array $body
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'workflowscheme/{id}/draft/issuetype/{issueType}',
                    [$id, $issueType]
                ),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param string $issueType
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function deleteDraftIssueType(int $id, string $issueType): array
    {
        return $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'workflowscheme/{id}/draft/issuetype/{issueType}',
                    [$id, $issueType]
                )
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDraftWorkflow(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('workflowscheme/{id}/draft/workflow', $id),
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
    public function updateDraftWorkflow(
        int $id,
        array $body,
        array $query = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl('workflowscheme/{id}/draft/workflow', $id),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return bool
     */
    public function deleteDraftWorkflow(int $id, array $query = []): bool
    {
        return HttpStatusCode::OK === $this->httpClient
            ->delete(
                $this->encodeUrl('workflowscheme/{id}/draft/workflow', $id),
                ['query' => $query]
            )
            ->getStatusCode();
    }

    /**
     * @param int $id
     * @param string $issueType
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getIssueType(
        int $id,
        string $issueType,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'workflowscheme/{id}/issuetype/{issueType}',
                    [$id, $issueType]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param string $issueType
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function setIssueType(int $id, string $issueType, array $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'workflowscheme/{id}/issuetype/{issueType}',
                    [$id, $issueType]
                ),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param string $issueType
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function deleteIssueType(
        int $id,
        string $issueType,
        array $query = []
    ): array {
        return $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'workflowscheme/{id}/issuetype/{issueType}',
                    [$id, $issueType]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getWorkflow(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('workflowscheme/{id}/workflow', $id),
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
    public function updateWorkflow(
        int $id,
        array $body,
        array $query = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl('workflowscheme/{id}/workflow', $id),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return bool
     */
    public function deleteWorkflow(int $id, array $query = []): bool
    {
        return HttpStatusCode::OK === $this->httpClient
            ->delete(
                $this->encodeUrl('workflowscheme/{id}/workflow', $id),
                ['query' => $query]
            )
            ->getStatusCode();
    }
}
