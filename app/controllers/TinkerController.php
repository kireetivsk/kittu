<?php

class TinkerController extends BaseController {

	public $_module = 'tinker';


	public function getIndex()
	{
		$user_id  = Auth::id();
		$message  = new Message();
		$messages = $message
			->whereToUser($user_id)
			->where("from_meta_message_status_id", "!=", MetaMessageStatus::STATUS_REVOKED)
			->with('toMetaMessageStatus',
				   'fromMetaMessageStatus',
				   'fromUser',
				   'fromUser.userConnection',
				   'fromUser.userConnection.metaConnectionRelationship')
			->orderBy('created_at', 'desc')
			->get();
		foreach ($messages as $key => $value)
		{
			$value->load(
				'fromUser.userConnection',
//				 ['fromUser.userConnection' => function ($query)
//												 {
//													 $query->where('connection_user_id', '=', Auth::id());
//												 }
//				 ],
				 'fromUser.userConnection.metaConnectionRelationship'
			);
			$test = $value->fromUser;
		}

		$test2 =  UserConnection::
			where('connection_user_id', '=', 102)
			->where('user_id', '=', 80)
			->with('connectionUser', 'metaConnectionRelationship')
			->get();


	}

}
