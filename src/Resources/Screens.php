<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Screens
 *
 * @package McMatters\JiraApi\Resources
 */
class Screens extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('screens', ['query' => $query])->json();
    }

    /**
     * @param string $fieldId
     *
     * @return bool
     */
    public function addFieldToDefault(string $fieldId): bool
    {
        return HttpStatusCode::CREATED === $this->httpClient
                ->post(
                    $this->encodeUrl('screens/addToDefault/{fieldId}', $fieldId)
                )
                ->getStatusCode();
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function availableFields(int $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('screens/{id}/availableFields', $id))
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function tabs(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('screens/{id}/tabs', $id),
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
    public function addTab(int $id, array $body): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('screens/{id}/tabs', $id),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param int $tabId
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function renameTab(int $id, int $tabId, array $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('screens/{id}/tabs/{tabId}', [$id, $tabId]),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param int $tabId
     *
     * @return bool
     */
    public function deleteTab(int $id, int $tabId): bool
    {
        return HttpStatusCode::CREATED === $this->httpClient
            ->delete(
                $this->encodeUrl('screens/{id}/tabs/{tabId}', [$id, $tabId])
            )
            ->getStatusCode();
    }

    /**
     * @param int $id
     * @param int $tabId
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function tabFields(int $id, int $tabId, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'screens/{id}/tabs/{tabId}/fields',
                    [$id, $tabId]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param int $tabId
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function addTabField(int $id, int $tabId, array $body): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'screens/{id}/tabs/{tabId}/fields',
                    [$id, $tabId]
                ),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param int $tabId
     * @param string $fieldId
     *
     * @return bool
     */
    public function deleteTabField(int $id, int $tabId, string $fieldId): bool
    {
        return HttpStatusCode::CREATED === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'screens/{id}/tabs/{tabId}/fields/{fieldId}',
                    [$id, $tabId, $fieldId]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param int $id
     * @param int $tabId
     * @param string $fieldId
     * @param array $body
     *
     * @return bool
     */
    public function moveTabField(
        int $id,
        int $tabId,
        string $fieldId,
        array $body
    ): bool {
        return HttpStatusCode::CREATED === $this->httpClient
            ->post(
                $this->encodeUrl(
                    'screens/{id}/tabs/{tabId}/fields/{fieldId}/move',
                    [$id, $tabId, $fieldId]
                ),
                ['json' => $body]
            )
            ->getStatusCode();
    }

    /**
     * @param int $id
     * @param int $tabId
     * @param int $position
     *
     * @return bool
     */
    public function moveTab(int $id, int $tabId, int $position): bool
    {
        return HttpStatusCode::CREATED === $this->httpClient
            ->post(
                $this->encodeUrl(
                    'screens/{id}/tabs/{tabId}/move/{position}',
                    [$id, $tabId, $position]
                )
            )
            ->getStatusCode();
    }
}
