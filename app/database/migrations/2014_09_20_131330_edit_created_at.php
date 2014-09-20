<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCreatedAt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('billing_items', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('companies', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('company_billing_transactions', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('company_profiles', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('connection_requests', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people_addresses', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people_contacts', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people_emails', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people_notes', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people_phones', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people_social', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('crm_people_websites', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('discussion_categories', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('discussion_comments', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('discussion_folders', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('discussion_follows', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('discussion_posts', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('discussion_topics', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('discussion_views', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('leads', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('messages', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('notifications', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
			});
		Schema::table('products', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('qna_answers', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('qna_comments', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('qna_questions', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('qna_rep_transactions', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('site_contacts', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('timestamp');
			});
		Schema::table('user_billing_transactions', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('user_company_map', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('user_connection_notes', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('user_connections', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('user_profiles', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('users', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
		Schema::table('user_settings', function($table)
			{
				$table->timestamps();
				$table->softDeletes();
				$table->dropColumn('created');
				$table->dropColumn('modified');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
