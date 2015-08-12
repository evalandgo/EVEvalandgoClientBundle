<?php

namespace EV\EvalandgoClientBundle\OAuth2\Storage;

use ApiClient\OAuth2\Storage\StorageInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class SymfonySessionStorage implements StorageInterface
{

    protected $session;

    public function __construct(Session $session) {
        $this->session = $session;
    }

    public function getClientId() {
        return $this->session->get('oauth2/client_id');
    }

    public function getClientSecret() {
        return $this->session->get('oauth2/client_secret');
    }

    public function getAccessToken() {
        return $this->session->get('oauth2/access_token');
    }

    public function getExpires() {
        return $this->session->get('oauth2/expires');
    }

    public function store($clientId, $clientSecret, $accessToken, $expires) {
        $this->session->set('oauth2/client_id', $clientId);
        $this->session->set('oauth2/client_secret', $clientSecret);
        $this->session->set('oauth2/access_token', $accessToken);
        $this->session->set('oauth2/expires', $expires);
    }

}
