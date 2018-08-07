<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Configuration
 *
 * @package McMatters\JiraApi\Resources
 */
class Configuration extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(): array
    {
        return $this->httpClient->get('configuration')->json();
    }

    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function timeTracking(): array
    {
        $response = $this->httpClient->get('configuration/timetracking');

        if (HttpStatusCode::OK === $response->getStatusCode()) {
            return $response->json();
        }

        return [];
    }

    /**
     * @param array $body
     *
     * @return bool
     */
    public function setTimeTracking(array $body): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
                ->post('configuration/timetracking', ['json' => $body])
                ->getStatusCode();
    }

    /**
     * @return bool
     */
    public function disableTimeTracking(): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete('configuration/timetracking')
            ->getStatusCode();
    }

    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function timeTrackingImplementations(): array
    {
        return $this->httpClient
            ->get('configuration/timetracking/list')
            ->json();
    }

    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function timeTrackingOptions(): array
    {
        return $this->httpClient
            ->get('configuration/timetracking/options')
            ->json();
    }

    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function setTimeTrackingOptions(array $body): array
    {
        return $this->httpClient
            ->put('configuration/timetracking/options', ['json' => $body])
            ->json();
    }
}
