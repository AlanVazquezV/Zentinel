<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Employees extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'employees';
	

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
	protected $fillable = ["employee_number","first_name","last_name","surname","tax_id","id_number","position_id","schedule_id","status","id_user","photo"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				employees.first_name LIKE ?  OR 
				employees.last_name LIKE ?  OR 
				employees.surname LIKE ?  OR 
				employees.tax_id LIKE ?  OR 
				employees.id_number LIKE ?  OR 
				schedules.label LIKE ?  OR 
				positions.title LIKE ?  OR 
				schedules.id LIKE ?  OR 
				positions.id LIKE ? 
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
			"employees.employee_number AS employee_number", 
			"employees.first_name AS first_name", 
			"employees.last_name AS last_name", 
			"employees.surname AS surname", 
			"employees.tax_id AS tax_id", 
			"employees.id_number AS id_number", 
			"employees.status AS status", 
			"employee_status.label AS employeestatus_label", 
			"schedules.label AS schedules_label", 
			"positions.title AS positions_title", 
			"schedules.id AS schedules_id", 
			"positions.id AS positions_id", 
			"employees.id AS id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"employees.employee_number AS employee_number", 
			"employees.first_name AS first_name", 
			"employees.last_name AS last_name", 
			"employees.surname AS surname", 
			"employees.tax_id AS tax_id", 
			"employees.id_number AS id_number", 
			"employees.status AS status", 
			"employee_status.label AS employeestatus_label", 
			"schedules.label AS schedules_label", 
			"positions.title AS positions_title", 
			"schedules.id AS schedules_id", 
			"positions.id AS positions_id", 
			"employees.id AS id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"employees.photo AS photo", 
			"employees.id AS id", 
			"employees.id_number AS id_number", 
			"employees.first_name AS first_name", 
			"employees.last_name AS last_name", 
			"employees.surname AS surname", 
			"employees.tax_id AS tax_id", 
			"employees.status AS status", 
			"employees.employee_number AS employee_number", 
			"schedules.id AS schedules_id", 
			"schedules.label AS schedules_label", 
			"schedules.status AS schedules_status", 
			"positions.id AS positions_id", 
			"positions.title AS positions_title" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"employees.photo AS photo", 
			"employees.id AS id", 
			"employees.id_number AS id_number", 
			"employees.first_name AS first_name", 
			"employees.last_name AS last_name", 
			"employees.surname AS surname", 
			"employees.tax_id AS tax_id", 
			"employees.status AS status", 
			"employees.employee_number AS employee_number", 
			"schedules.id AS schedules_id", 
			"schedules.label AS schedules_label", 
			"schedules.status AS schedules_status", 
			"positions.id AS positions_id", 
			"positions.title AS positions_title" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"employee_number", 
			"first_name", 
			"last_name", 
			"surname", 
			"tax_id", 
			"id_number", 
			"position_id", 
			"schedule_id", 
			"status", 
			"id_user", 
			"photo", 
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
