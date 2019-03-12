<?php

namespace App\Controller\gthubApi\client\services;


class GitHubGitTags extends GitHubService
{

	/**
	 * Get a Tag
	 * 
	 * @return GitHubGittag
	 */
	public function getTag($owner, $repo, $sha)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/git/tags/$sha", 'GET', $data, 200, 'GitHubGittag');
	}
	
}

