<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Biometrics extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'biometrics';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["employee_id","type","value","status"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				biometrics.id LIKE ?  OR 
				biometrics.value LIKE ?  OR 
				biometric_types.label LIKE ?  OR 
				biometric_status.label LIKE ?  OR 
				employees.id LIKE ?  OR 
				employees.first_name LIKE ?  OR 
				employees.last_name LIKE ?  OR 
				employees.tax_id LIKE ?  OR 
				employees.id_number LIKE ?  OR 
				employees.surname LIKE ?  OR 
				biometric_status.id LIKE ?  OR 
				biometric_types.id LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"biometrics.id AS id", 
			"biometrics.value AS value", 
			"employees.employee_number AS employees_employee_number", 
			"biometric_types.label AS biometrictypes_label", 
			"biometric_status.label AS biometricstatus_label", 
			"employees.id AS employees_id", 
			"biometric_status.id AS biometricstatus_id", 
			"biometric_types.id AS biometrictypes_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"biometrics.id AS id", 
			"biometrics.value AS value", 
			"employees.employee_number AS employees_employee_number", 
			"biometric_types.label AS biometrictypes_label", 
			"biometric_status.label AS biometricstatus_label", 
			"employees.id AS employees_id", 
			"biometric_status.id AS biometricstatus_id", 
			"biometric_types.id AS biometrictypes_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"biometrics.value AS value", 
			"employees.employee_number AS employees_employee_number", 
			"biometric_status.label AS biometricstatus_label", 
			"biometric_types.label AS biometrictypes_label", 
			"biometrics.created_at AS created_at", 
			"biometrics.updated_at AS updated_at", 
			"biometrics.id AS id", 
			"employees.id AS employees_id", 
			"biometric_status.id AS biometricstatus_id", 
			"biometric_types.id AS biometrictypes_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"biometrics.value AS value", 
			"employees.employee_number AS employees_employee_number", 
			"biometric_status.label AS biometricstatus_label", 
			"biometric_types.label AS biometrictypes_label", 
			"biometrics.created_at AS created_at", 
			"biometrics.updated_at AS updated_at", 
			"biometrics.id AS id", 
			"employees.id AS employees_id", 
			"biometric_status.id AS biometricstatus_id", 
			"biometric_types.id AS biometrictypes_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"employee_id", 
			"type", 
			"value", 
			"status", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
	

	/**
     * Audit log events
     * 
     * @var array
     */
	protected $auditEvents = ['created', 'updated', 'deleted'];
}
