<?php
namespace App\Controller\gthubApi\client;




class GitHubClient extends GitHubClientBase
{

	/**
	 * @var GitHubActivity
	 */
	public $activity;
	
	/**
	 * @var GitHubChangelog
	 */
	public $changelog;
	
	/**
	 * @var GitHubGists
	 */
	public $gists;
	
	/**
	 * @var GitHubGit
	 */
	public $git;
	
	/**
	 * @var GitHubGitignore
	 */
	public $gitignore;
	
	/**
	 * @var GitHubIssues
	 */
	public $issues;
	
	/**
	 * @var GitHubLibraries
	 */
	public $libraries;
	
	/**
	 * @var GitHubMarkdown
	 */
	public $markdown;
	
	/**
	 * @var GitHubMedia
	 */
	public $media;
	
	/**
	 * @var GitHubMeta
	 */
	public $meta;
	
	/**
	 * @var GitHubOauth
	 */
	public $oauth;
	
	/**
	 * @var GitHubOrgs
	 */
	public $orgs;
	
	/**
	 * @var GitHubPulls
	 */
	public $pulls;
	
	/**
	 * @var GitHubRepos
	 */
	public $repos;
	
	/**
	 * @var GitHubSearch
	 */
	public $search;
	
	/**
	 * @var GitHubUsers
	 */
	public $users;
	
	
	/**
	 * Initialize sub services
	 */
	public function __construct()
	{
		$this->activity = new GitHubActivity($this);
		$this->changelog = new GitHubChangelog($this);
		$this->gists = new GitHubGists($this);
		$this->git = new GitHubGit($this);
		$this->gitignore = new GitHubGitignore($this);
		$this->issues = new GitHubIssues($this);
		$this->libraries = new GitHubLibraries($this);
		$this->markdown = new GitHubMarkdown($this);
		$this->media = new GitHubMedia($this);
		$this->meta = new GitHubMeta($this);
		$this->oauth = new GitHubOauth($this);
		$this->orgs = new GitHubOrgs($this);
		$this->pulls = new GitHubPulls($this);
		$this->repos = new GitHubRepos($this);
		$this->search = new GitHubSearch($this);
		$this->users = new GitHubUsers($this);
	}
	
}

