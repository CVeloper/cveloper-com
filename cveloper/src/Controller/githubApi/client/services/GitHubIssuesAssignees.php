<?php

namespace App\Controller\gthubApi\client\services;

class GitHubIssuesAssignees extends GitHubService
{

	/**
	 * List assignees
	 * 
	 * @return array<GitHubUser>
	 */
	public function listAssignees($owner, $repo)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/assignees", 'GET', $data, 200, 'GitHubUser', true);
	}
	
}

