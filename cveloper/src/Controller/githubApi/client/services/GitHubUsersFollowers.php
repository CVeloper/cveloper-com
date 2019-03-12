<?php

namespace App\Controller\gthubApi\client\services;


	

class GitHubUsersFollowers extends GitHubService
{

	/**
	 * List followers of a user
	 * 
	 */
	public function listFollowersOfUser($user)
	{
		$data = array();
		
		return $this->client->request('/users/'.$user.'/followers', 'GET', $data, 200, 'GitHubFullUser');
	}
	
}

