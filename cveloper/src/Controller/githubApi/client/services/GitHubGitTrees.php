<?php

namespace App\Controller\gthubApi\client\services;


class GitHubGitTrees extends GitHubService
{

	/**
	 * Get a Tree
	 * 
	 * @return GitHubTreeExtra
	 */
	public function getTree($owner, $repo, $sha)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/git/trees/$sha", 'GET', $data, 200, 'GitHubTreeExtra');
	}
	
	/**
	 * Get a Tree Recursively
	 * 
	 * @return GitHubTreeExtra
	 */
	public function getTreeRecursively($owner, $repo, $sha)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/git/trees/$sha?recursive=1", 'GET', $data, 200, 'GitHubTreeExtra');
	}
}

