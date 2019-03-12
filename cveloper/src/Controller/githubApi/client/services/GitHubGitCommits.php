<?php

namespace App\Controller\gthubApi\client\services;


class GitHubGitCommits extends GitHubService
{

	/**
	 * Get a Commit
	 * 
	 * @return GitHubGitCommit
	 */
	public function getCommit($owner, $repo, $sha)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/git/commits/$sha", 'GET', $data, 200, 'GitHubGitCommit');
	}
	
}

