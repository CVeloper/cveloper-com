<?php

namespace App\Controller\gthubApi\client\services;

class GitHubIssuesEvents extends GitHubService
{

	/**
	 * Attributes
	 * 
	 * @return GitHubFullIssueEvent
	 */
	public function attributes($owner, $repo, $id)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/issues/events/$id", 'GET', $data, 200, 'GitHubFullIssueEvent');
	}
	
}

