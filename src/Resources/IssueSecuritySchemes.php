<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class IssueSecuritySchemes
 *
 * @package McMatters\JiraApi\Resources
 */
class IssueSecuritySchemes extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('issuesecurityschemes')->json();
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
            ->get($this->encodeUrl('issuesecurityschemes/{id}', $id))
            ->json();
    }
}
