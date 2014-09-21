<?php

/**
 * CompanyBillingTransaction
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $billing_item_id
 * @property float $amount
 * @property integer $meta_billing_status_id
 * @property integer $company_payment_profile_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereCompanyId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereBillingItemId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereAmount($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereMetaBillingStatusId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereCompanyPaymentProfileId($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\CompanyBillingTransaction whereDeletedAt($value) 
 */
class CompanyBillingTransaction extends \Eloquent {
	protected $fillable = [];
}