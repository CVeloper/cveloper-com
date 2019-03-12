<?php

namespace App\Controller\gthubApi\client\services;


class GitHubReposForks extends GitHubService
{

	/**
	 * List forks
	 * 
	 * @return array<GitHubRepo>
	 */
	public function listForks($owner, $repo)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/forks", 'GET', $data, 200, 'GitHubRepo', true);
	}
	
}

