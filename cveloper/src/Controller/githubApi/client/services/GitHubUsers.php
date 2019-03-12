<?php

namespace App\Controller\gthubApi\client\services;

	

class GitHubUsers extends GitHubService
{

	/**
	 * @var GitHubUsersEmails
	 */
	public $emails;
	
	/**
	 * @var GitHubUsersFollowers
	 */
	public $followers;
	
	/**
	 * @var GitHubUsersKeys
	 */
	public $keys;
	
	
	/**
	 * Initialize sub services
	 */
	public function __construct(GitHubClient $client)
	{
		parent::__construct($client);
		
		$this->emails = new GitHubUsersEmails($client);
		$this->followers = new GitHubUsersFollowers($client);
		$this->keys = new GitHubUsersKeys($client);
	}
	
	/**
	 * Get a single user
	 * 
	 * @return GitHubFullUser
	 */
	public function getSingleUser($user)
	{
		$data = array();
		
		return $this->client->request("/users/$user", 'GET', $data, 200, 'GitHubFullUser');
	}
	
	/**
	 * Get the authenticated user
	 * 
	 * @return GitHubPrivateUser
	 */
	public function getTheAuthenticatedUser()
	{
		$data = array();
		
		return $this->client->request("/user", 'GET', $data, 200, 'GitHubPrivateUser');
	}
	
	/**
	 * Update the authenticated user
	 * 
	 * @param $email string (Optional) - Publicly visible email address.
	 * @return GitHubPrivateUser
	 */
	public function updateTheAuthenticatedUser($email = null)
	{
		$data = array();
		if(!is_null($email))
			$data['email'] = $email;
		
		return $this->client->request("/user", 'PATCH', $data, 200, 'GitHubPrivateUser');
	}
	
	/**
	 * Get all users
	 * 
	 * @return array<GitHubUser>
	 */
	public function getAllUsers()
	{
		$data = array();
		
		return $this->client->request("/users", 'GET', $data, 200, 'GitHubUser', true);
	}
	
}

