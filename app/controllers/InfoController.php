<?php

class InfoController extends \Phalcon\Mvc\Controller
{	
	public function indexAction()
	{
		echo "Guidelines on how to use";
		exit;
	}

	public function userAction()
	{
		ini_set('display_errors', '1');
		$requestType = $_SERVER['REQUEST_METHOD'];

		if($requestType == "GET")
		{
			$userId = $this->dispatcher->getParam(0);

			if(empty($userId))
			{
				echo "{'status':400, 'response':'No user identifier'}";
				exit;
			}
			else
			{
				$user = new Users();
				$userLookupResults = $user->find("user_id = 'uid-0918201923481'");
				if($userLookupResults->valid())
				{
					$firstRow = $userLookupResults->getFirst();
					var_dump($firstRow->account_name);
					exit;
				}
			}
		}
		else
		{
			var_dump("end");exit;
		}
		
	}

}
