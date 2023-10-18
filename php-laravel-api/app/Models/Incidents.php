<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Incidents extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'incidents';
	

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
	protected $fillable = ["attendance_id","employee_id","status","updated_by","justified","description","documents"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				incidents.description LIKE ?  OR 
				incidents.documents LIKE ?  OR 
				incidents_status.label LIKE ?  OR 
				attendance.id LIKE ?  OR 
				employees.id LIKE ?  OR 
				employees.first_name LIKE ?  OR 
				employees.last_name LIKE ?  OR 
				employees.tax_id LIKE ?  OR 
				employees.id_number LIKE ?  OR 
				employees.surname LIKE ?  OR 
				incidents_status.id LIKE ?  OR 
				incidents.id LIKE ? 
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
			"incidents.justified AS justified", 
			"incidents.description AS description", 
			"incidents.documents AS documents", 
			"attendance.date AS attendance_date", 
			"incidents_status.label AS incidentsstatus_label", 
			"employees.employee_number AS employees_employee_number", 
			"incidents.updated_by AS updated_by", 
			"attendance.id AS attendance_id", 
			"employees.id AS employees_id", 
			"incidents_status.id AS incidentsstatus_id", 
			"incidents.id AS id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"incidents.justified AS justified", 
			"incidents.description AS description", 
			"incidents.documents AS documents", 
			"attendance.date AS attendance_date", 
			"incidents_status.label AS incidentsstatus_label", 
			"employees.employee_number AS employees_employee_number", 
			"incidents.updated_by AS updated_by", 
			"attendance.id AS attendance_id", 
			"employees.id AS employees_id", 
			"incidents_status.id AS incidentsstatus_id", 
			"incidents.id AS id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"incidents.updated_by AS updated_by", 
			"incidents.justified AS justified", 
			"incidents.description AS description", 
			"incidents.documents AS documents", 
			"attendance.date AS attendance_date", 
			"employees.employee_number AS employees_employee_number", 
			"incidents_status.label AS incidentsstatus_label", 
			"incidents.id AS id", 
			"attendance.id AS attendance_id", 
			"employees.id AS employees_id", 
			"incidents_status.id AS incidentsstatus_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"incidents.updated_by AS updated_by", 
			"incidents.justified AS justified", 
			"incidents.description AS description", 
			"incidents.documents AS documents", 
			"attendance.date AS attendance_date", 
			"employees.employee_number AS employees_employee_number", 
			"incidents_status.label AS incidentsstatus_label", 
			"incidents.id AS id", 
			"attendance.id AS attendance_id", 
			"employees.id AS employees_id", 
			"incidents_status.id AS incidentsstatus_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"attendance_id", 
			"employee_id", 
			"status", 
			"updated_by", 
			"justified", 
			"description", 
			"documents", 
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
