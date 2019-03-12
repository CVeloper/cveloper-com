<?php
namespace App\Controller\gthubApi\client;

class GitHubService
{
	/**
	 * @var GitHubClient
	 */
	protected $client;
	
	/**
	 * @param GitHubClient $client
	 */
	public function __construct(GitHubClient $client)
	{
		$this->client = $client;
	}
}
