<?php

namespace App\Controller\gthubApi\client\services;


class GitHubGitignore extends GitHubService
{

	/**
	 * Listing available templates
	 * 
	 * @return array<GitHubTemplates>
	 */
	public function listingAvailableTemplates()
	{
		$data = array();
		
		return $this->client->request("/gitignore/templates", 'GET', $data, 200, 'GitHubTemplates', true);
	}
	
	/**
	 * Get a single template
	 * 
	 * @return array<GitHubTemplate>
	 */
	public function getSingleTemplate()
	{
		$data = array();
		
		return $this->client->request("/gitignore/templates/C", 'GET', $data, 200, 'GitHubTemplate', true);
	}
	
}

