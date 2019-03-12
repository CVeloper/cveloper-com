<?php

namespace App\Controller\gthubApi\client\objects;

	

class GitHubPublicKey extends GitHubObject
{
	/* (non-PHPdoc)
	 * @see GitHubObject::getAttributes()
	 */
	protected function getAttributes()
	{
		return array_merge(parent::getAttributes(), array(
			'url' => 'string',
			'title' => 'string',
		));
	}
	
	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

}

