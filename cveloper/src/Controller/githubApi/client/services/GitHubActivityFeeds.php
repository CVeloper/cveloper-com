<?php

namespace App\Controller\gthubApi\client\services;

class GitHubActivityFeeds extends GitHubService
{

	/**
	 * List Feeds
	 * 
	 * @return GitHubFeeds
	 */
	public function listFeeds()
	{
		$data = array();
		
		return $this->client->request("/feeds", 'GET', $data, 200, 'GitHubFeeds');
	}
	
}

