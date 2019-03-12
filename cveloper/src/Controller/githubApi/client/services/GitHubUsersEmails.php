<?php

namespace App\Controller\gthubApi\client\services;


	

class GitHubUsersEmails extends GitHubService
{

	/**
	 * List email addresses for a user
	 * 
	 */
	public function listEmailAddressesForUser()
	{
		$data = array();
		
		return $this->client->request("/user/emails", 'DELETE', $data, 204, '');
	}
	
}

