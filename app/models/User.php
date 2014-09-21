<?php

/**
 * User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property string $first_name
 * @property string $last_name
 * @property boolean $activated
 * @property boolean $banned
 * @property string $ban_reason
 * @property string $new_password_key
 * @property string $new_password_requested
 * @property string $new_email
 * @property string $new_email_key
 * @property string $last_ip
 * @property string $last_login
 * @property integer $meta_user_status_id
 * @property integer $meta_user_type_id
 * @property boolean $stripe_active
 * @property string $stripe_id
 * @property string $stripe_subscription
 * @property string $stripe_plan
 * @property string $last_four
 * @property string $trial_ends_at
 * @property string $subscription_ends_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereSalt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereFirstName($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereLastName($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereActivated($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereBanned($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereBanReason($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereNewPasswordKey($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereNewPasswordRequested($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereNewEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereNewEmailKey($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereLastIp($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereLastLogin($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereMetaUserStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereMetaUserTypeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereStripeActive($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereStripeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereStripeSubscription($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereStripePlan($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereLastFour($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereTrialEndsAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereSubscriptionEndsAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereDeletedAt($value) 
 */
class User extends \Eloquent {
	protected $fillable = [];
}