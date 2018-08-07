<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Workflow
 *
 * @package McMatters\JiraApi\Resources
 */
class Workflow extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('workflow', ['query' => $query])->json();
    }

    /**
     * @param int $transitionId
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function transitionProperties(
        int $transitionId,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'workflow/transitions/{transitionId}/properties',
                    $transitionId
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $transitionId
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateTransitionProperty(
        int $transitionId,
        array $body,
        array $query
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'workflow/transitions/{transitionId}/properties',
                    $transitionId
                ),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param int $transitionId
     * @param array $body
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createTransitionProperty(
        int $transitionId,
        array $body,
        array $query
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'workflow/transitions/{transitionId}/properties',
                    $transitionId
                ),
                ['json' => $body, 'query' => $query]
            )
            ->json();
    }

    /**
     * @param int $transitionId
     * @param array $query
     *
     * @return bool
     */
    public function deleteTransitionProperty(
        int $transitionId,
        array $query
    ): bool {
        return HttpStatusCode::OK === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'workflow/transitions/{transitionId}/properties',
                    $transitionId
                ),
                ['query' => $query]
            )
            ->getStatusCode();
    }
}
