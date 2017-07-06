<?php

namespace Omniphx\Forrest\Repositories;

use Omniphx\Forrest\Interfaces\RepositoryInterface;

class InstanceURLRepository implements RepositoryInterface {

    protected $tokenRepo;
    protected $settings;

    public function __construct(RepositoryInterface $tokenRepo, $settings) {
        $this->tokenRepo = $tokenRepo;
        $this->settings  = $settings;
    }

    public function put($instanceURL) {
        $this->settings['instanceURL'] = $instanceURL;
    }

    /**
     * Get version
     *
     * @return mixed
     */
    public function get()
    {
        $url = $this->settings['instanceURL'];

        if(!empty($url)) {
            return $url;
        } else {
            return $this->tokenRepo->get()['instance_url'];
        }
    } 
}