<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Attendance extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'attendance';
	

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
	protected $fillable = ["employee_id","date","time","check_type","status"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				attendance_status.label LIKE ?  OR 
				attendance.id LIKE ?  OR 
				employees.id LIKE ?  OR 
				employees.first_name LIKE ?  OR 
				employees.last_name LIKE ?  OR 
				employees.tax_id LIKE ?  OR 
				employees.id_number LIKE ?  OR 
				employees.surname LIKE ?  OR 
				attendance_status.id LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"attendance.date AS date", 
			"attendance.time AS time", 
			"attendance.check_type AS check_type", 
			"employees.employee_number AS employees_employee_number", 
			"attendance_status.label AS attendancestatus_label", 
			"attendance.id AS id", 
			"employees.id AS employees_id", 
			"attendance_status.id AS attendancestatus_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"attendance.date AS date", 
			"attendance.time AS time", 
			"attendance.check_type AS check_type", 
			"employees.employee_number AS employees_employee_number", 
			"attendance_status.label AS attendancestatus_label", 
			"attendance.id AS id", 
			"employees.id AS employees_id", 
			"attendance_status.id AS attendancestatus_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"attendance.date AS date", 
			"attendance.time AS time", 
			"attendance.check_type AS check_type", 
			"employees.employee_number AS employees_employee_number", 
			"attendance_status.label AS attendancestatus_label", 
			"attendance.id AS id", 
			"employees.id AS employees_id", 
			"attendance_status.id AS attendancestatus_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"attendance.date AS date", 
			"attendance.time AS time", 
			"attendance.check_type AS check_type", 
			"employees.employee_number AS employees_employee_number", 
			"attendance_status.label AS attendancestatus_label", 
			"attendance.id AS id", 
			"employees.id AS employees_id", 
			"attendance_status.id AS attendancestatus_id" 
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
			"date", 
			"time", 
			"check_type", 
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
}
