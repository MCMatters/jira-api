<?php

declare(strict_types = 1);

namespace McMatters\JiraApi;

use McMatters\JiraApi\Resources\{
    ApplicationProperty, ApplicationRole, Attachment, Auditing, Avatar, Comment,
    Component, Configuration, CustomFieldOption, Dashboard, Field, Filter,
    Group, Groups, GroupUserPicker, Issue, IssueLink, IssueLinkType,
    IssueSecuritySchemes, IssueType, Jql, LicenseValidator, MyPermissions,
    MyPreferences, Myself, NotificationScheme, Permissions, PermissionScheme,
    Priority, Project, ProjectCategory, ProjectValidate, Resolution, Role,
    Screens, Search, SecurityLevel, ServerInfo, Settings, Status,
    StatusCategory, UniversalAvatar, User, Version, Workflow, WorkflowScheme, Worklog
};
use function ucfirst;

/**
 * Class JiraClient
 *
 * @package McMatters\JiraApi
 */
class JiraClient
{
    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var array
     */
    protected $resources = [];

    /**
     * JiraClient constructor.
     *
     * @param string $apiUrl
     * @param string $token
     */
    public function __construct(string $apiUrl, string $token)
    {
        $this->apiUrl = $apiUrl;
        $this->token = $token;
    }

    /**
     * @return ApplicationProperty
     */
    public function applicationProperty(): ApplicationProperty
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ApplicationRole
     */
    public function applicationRole(): ApplicationRole
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Attachment
     */
    public function attachment(): Attachment
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Auditing
     */
    public function auditing(): Auditing
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Avatar
     */
    public function avatar(): Avatar
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Comment
     */
    public function comment(): Comment
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Component
     */
    public function component(): Component
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Configuration
     */
    public function configuration(): Configuration
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return CustomFieldOption
     */
    public function customFieldOptions(): CustomFieldOption
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Dashboard
     */
    public function dashboard(): Dashboard
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Field
     */
    public function field(): Field
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Filter
     */
    public function filter(): Filter
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Group
     */
    public function group(): Group
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Groups
     */
    public function groups(): Groups
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupUserPicker
     */
    public function groupUserPicker(): GroupUserPicker
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Issue
     */
    public function issue(): Issue
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueLink
     */
    public function issueLink(): IssueLink
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueLinkType
     */
    public function issueLinkType(): IssueLinkType
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueSecuritySchemes
     */
    public function issueSecuritySchemes(): IssueSecuritySchemes
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueType
     */
    public function issueType(): IssueType
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Jql
     */
    public function jql(): Jql
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return LicenseValidator
     */
    public function licenseValidator(): LicenseValidator
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return MyPermissions
     */
    public function myPermissions(): MyPermissions
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return MyPreferences
     */
    public function myPreferences(): MyPreferences
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Myself
     */
    public function myself(): Myself
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return NotificationScheme
     */
    public function notificationScheme(): NotificationScheme
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Permissions
     */
    public function permissions(): Permissions
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return PermissionScheme
     */
    public function permissionScheme(): PermissionScheme
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Priority
     */
    public function priority(): Priority
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Project
     */
    public function project(): Project
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectCategory
     */
    public function projectCategory(): ProjectCategory
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectValidate
     */
    public function projectValidate(): ProjectValidate
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Resolution
     */
    public function resolution(): Resolution
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Role
     */
    public function role(): Role
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Screens
     */
    public function screens(): Screens
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Search
     */
    public function search(): Search
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return SecurityLevel
     */
    public function securityLevel(): SecurityLevel
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ServerInfo
     */
    public function serverInfo(): ServerInfo
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Settings
     */
    public function settings(): Settings
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Status
     */
    public function status(): Status
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return StatusCategory
     */
    public function statusCategory(): StatusCategory
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return UniversalAvatar
     */
    public function universalAvatar(): UniversalAvatar
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Version
     */
    public function version(): Version
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Workflow
     */
    public function workflow(): Workflow
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return WorkflowScheme
     */
    public function workflowScheme(): WorkflowScheme
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Worklog
     */
    public function worklog(): Worklog
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function resource(string $name)
    {
        if (!empty($this->resources[$name])) {
            return $this->resources[$name];
        }

        $class = __NAMESPACE__.'\\Resources\\'.ucfirst($name);

        $this->resources[$name] = new $class($this->apiUrl, $this->token);

        return $this->resources[$name];
    }
}
