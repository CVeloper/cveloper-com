<?php

namespace App\Controller\gthubApi\client\services;


class GitHubReposHooks extends GitHubService
{

	/**
	 * List
	 * 
	 * @return GitHubHook
	 */
	public function listReposHooks($owner, $repo, $id)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/hooks/$id", 'GET', $data, 200, 'GitHubHook');
	}
	
	/**
	 * Create a hook
	 * 
	 */
	public function createHook($owner, $repo, $id)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/hooks/$id", 'DELETE', $data, 204, '');
	}
	
}

