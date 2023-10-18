<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class WorkingHours extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'working_hours';
	

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
	protected $fillable = ["schedule_id","day","is_working","start_time","end_time"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				schedules.label LIKE ?  OR 
				working_hours.day LIKE ?  OR 
				working_hours.is_working LIKE ?  OR 
				working_hours.end_time LIKE ?  OR 
				working_hours.id LIKE ?  OR 
				schedules.id LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"schedules.label AS schedules_label", 
			"working_hours.day AS day", 
			"working_hours.is_working AS is_working", 
			"working_hours.start_time AS start_time", 
			"working_hours.end_time AS end_time", 
			"working_hours.id AS id", 
			"schedules.id AS schedules_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"schedules.label AS schedules_label", 
			"working_hours.day AS day", 
			"working_hours.is_working AS is_working", 
			"working_hours.start_time AS start_time", 
			"working_hours.end_time AS end_time", 
			"working_hours.id AS id", 
			"schedules.id AS schedules_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"working_hours.id AS id", 
			"schedules.label AS schedules_label", 
			"working_hours.day AS day", 
			"working_hours.is_working AS is_working", 
			"working_hours.start_time AS start_time", 
			"working_hours.end_time AS end_time", 
			"schedules.id AS schedules_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"working_hours.id AS id", 
			"schedules.label AS schedules_label", 
			"working_hours.day AS day", 
			"working_hours.is_working AS is_working", 
			"working_hours.start_time AS start_time", 
			"working_hours.end_time AS end_time", 
			"schedules.id AS schedules_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"schedule_id", 
			"day", 
			"is_working", 
			"start_time", 
			"end_time", 
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
