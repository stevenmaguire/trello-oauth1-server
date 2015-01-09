<?php namespace Stevenmaguire\OAuth1\Client\Server;

use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;
use League\OAuth1\Client\Server\User;

class Trello extends Server
{
    /**
     * Application key
     *
     * @var string
     */
    protected $application_key;

    /**
     * Access token
     *
     * @var string
     */
    protected $access_token;

    /**
     * Set the application key
     *
     * @param string $application_key
     *
     * @return Trello
     */
    public function setApplicationKey($application_key)
    {
        $this->application_key = $application_key;
        return $this;
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
        return 'https://trello.com/1/OAuthAuthorizeToken';
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
}
