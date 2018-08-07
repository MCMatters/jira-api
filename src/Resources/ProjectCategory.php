<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class ProjectCategory
 *
 * @package McMatters\JiraApi\Resources
 */
class ProjectCategory extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('projectCategory')->json();
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
            ->post('projectCategory', ['json' => $body])
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
            ->get($this->encodeUrl('projectCategory/{id}', $id))
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
                $this->encodeUrl('projectCategory/{id}', $id),
                ['json' => $body]
            )
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
            ->delete($this->encodeUrl('projectCategory/{id}', $id))
            ->getStatusCode();
    }
}
