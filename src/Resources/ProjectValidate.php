<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class ProjectValidate
 *
 * @package McMatters\JiraApi\Resources
 */
class ProjectValidate extends AbstractResource
{
    /**
     * @param string $key
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function validateKey(string $key): array
    {
        return $this->httpClient
            ->get('projectvalidate/key', ['query' => ['key' => $key]])
            ->json();
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function getValidKey(string $key): string
    {
        return $this->httpClient
            ->get(
                'projectvalidate/validProjectKey',
                ['query' => ['key' => $key]]
            )
            ->getBody();
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function getValidName(string $name): string
    {
        return $this->httpClient
            ->get(
                'projectvalidate/validProjectName',
                ['query' => ['name' => $name]]
            )
            ->getBody();
    }
}
