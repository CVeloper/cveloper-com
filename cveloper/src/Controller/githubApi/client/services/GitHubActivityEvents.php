<?php

namespace App\Controller\gthubApi\client\services;


class GitHubActivityEvents extends GitHubService
{

	/**
	 * @var GitHubActivityEventsTypes
	 */
	public $types;
	
	
	/**
	 * Initialize sub services
	 */
	public function __construct(GitHubClient $client)
	{
		parent::__construct($client);
		
		$this->types = new GitHubActivityEventsTypes($client);
	}
	
}

