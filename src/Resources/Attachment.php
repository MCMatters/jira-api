<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Attachment
 *
 * @package McMatters\JiraApi\Resources
 */
class Attachment extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function globalSettings(): array
    {
        return $this->httpClient->get('attachment/meta')->json();
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
            ->get($this->encodeUrl('attachment/{id}', $id))
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
            ->delete($this->encodeUrl('attachment/{id}', $id))
            ->getStatusCode();
    }
}
