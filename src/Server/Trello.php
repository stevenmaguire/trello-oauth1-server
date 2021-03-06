<?php namespace Stevenmaguire\OAuth1\Client\Server;

use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;
use League\OAuth1\Client\Server\User;

class Trello extends Server
{
    /**
     * Access token
     *
     * @var string
     */
    protected $access_token;

    /**
     * Application expiration
     *
     * @var string
     */
    protected $application_expiration;

    /**
     * Application key
     *
     * @var string
     */
    protected $application_key;

    /**
     * Application name
     *
     * @var string
     */
    protected $application_name;

    /**
     * Application scope
     *
     * @var string
     */
    protected $application_scope;

    /**
     * {@inheritDoc}
     */
    public function __construct($clientCredentials, SignatureInterface $signature = null)
    {
        parent::__construct($clientCredentials, $signature);
        if (is_array($clientCredentials)) {
            $this->parseConfigurationArray($clientCredentials);
        }
    }

    /**
     * Set the access token
     *
     * @param string $access_token
     *
     * @return Trello
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * Set the application expiration
     *
     * @param string $application_expiration
     *
     * @return Trello
     */
    public function setApplicationExpiration($application_expiration)
    {
        $this->application_expiration = $application_expiration;
        return $this;
    }

    /**
     * Get application expiration
     *
     * @return string
     */
    public function getApplicationExpiration()
    {
        return $this->application_expiration ?: '1day';
    }

    /**
     * Set the application name
     *
     * @param string $application_name
     *
     * @return Trello
     */
    public function setApplicationName($application_name)
    {
        $this->application_name = $application_name;
        return $this;
    }

    /**
     * Get application name
     *
     * @return string|null
     */
    public function getApplicationName()
    {
        return $this->application_name ?: null;
    }

    /**
     * Set the application scope
     *
     * @param string $application_scope
     *
     * @return Trello
     */
    public function setApplicationScope($application_scope)
    {
        $this->application_scope = $application_scope;
        return $this;
    }

    /**
     * Get application scope
     *
     * @return string
     */
    public function getApplicationScope()
    {
        return $this->application_scope ?: 'read';
    }

    /**
     * {@inheritDoc}
     */
    public function urlTemporaryCredentials()
    {
        return 'https://trello.com/1/OAuthGetRequestToken';
    }

    /**
     * {@inheritDoc}
     */
    public function urlAuthorization()
    {
        return 'https://trello.com/1/OAuthAuthorizeToken?'.
            $this->buildAuthorizationQueryParameters();
    }

    /**
     * {@inheritDoc}
     */
    public function urlTokenCredentials()
    {
        return 'https://trello.com/1/OAuthGetAccessToken';
    }

    /**
     * {@inheritDoc}
     */
    public function urlUserDetails()
    {
        return 'https://trello.com/1/members/me?key='.$this->application_key.'&token='.$this->access_token;
    }

    /**
     * {@inheritDoc}
     */
    public function userDetails($data, TokenCredentials $tokenCredentials)
    {
        $user = new User;

        $user->nickname = $data['username'];
        $user->name = $data['fullName'];
        $user->imageUrl = null;

        $user->extra = (array) $data;

        return $user;
    }

    /**
     * {@inheritDoc}
     */
    public function userUid($data, TokenCredentials $tokenCredentials)
    {
        return $data['id'];
    }

    /**
     * {@inheritDoc}
     */
    public function userEmail($data, TokenCredentials $tokenCredentials)
    {
        return;
    }

    /**
     * {@inheritDoc}
     */
    public function userScreenName($data, TokenCredentials $tokenCredentials)
    {
        return $data['username'];
    }

    /**
     * Build authorization query parameters
     *
     * @return string
     */
    private function buildAuthorizationQueryParameters()
    {
        $params = [
            'response_type' => 'fragment',
            'scope' => $this->getApplicationScope(),
            'expiration' => $this->getApplicationExpiration(),
            'name' => $this->getApplicationName()
        ];

        return http_build_query($params);
    }

    /**
     * Parse configuration array to set attributes
     *
     * @param  array $configuration
     */
    private function parseConfigurationArray(array $configuration = array())
    {
        $config_attribute_map = [
            'identifier' => 'application_key',
            'expiration' => 'application_expiration',
            'name' => 'application_name',
            'scope' => 'application_scope'
        ];

        foreach ($config_attribute_map as $config => $attr) {
            if (isset($configuration[$config])) {
                $this->$attr = $configuration[$config];
            }
        }
    }
}
