<?php

namespace App\Controller\gthubApi\client\objects;

	

class GitHubGitCommitParents extends GitHubObject
{
	/* (non-PHPdoc)
	 * @see GitHubObject::getAttributes()
	 */
	protected function getAttributes()
	{
		return array_merge(parent::getAttributes(), array(
		));
	}
	
}

