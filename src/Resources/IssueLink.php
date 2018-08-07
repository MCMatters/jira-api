<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class IssueLink
 *
 * @package McMatters\JiraApi\Resources
 */
class IssueLink extends AbstractResource
{
    /**
     * @param array $body
     *
     * @return bool
     */
    public function create(array $body): bool
    {
        return HttpStatusCode::CREATED === $this->httpClient
            ->post('issueLink', ['json' => $body])
            ->getStatusCode();
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
            ->get($this->encodeUrl('issueLink/{id}', $id))
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
            ->delete($this->encodeUrl('issueLink/{id}', $id))
            ->getStatusCode();
    }
}
