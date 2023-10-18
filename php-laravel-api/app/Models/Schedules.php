<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Schedules extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'schedules';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	public $incrementing = false;
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["id","label","status"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				schedules.label LIKE ?  OR 
				schedules_status.label LIKE ?  OR 
				schedules.id LIKE ?  OR 
				schedules_status.id LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%"
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
			"schedules.label AS label", 
			"schedules_status.label AS schedulesstatus_label", 
			"schedules.created_at AS created_at", 
			"schedules.updated_at AS updated_at", 
			"schedules.id AS id", 
			"schedules_status.id AS schedulesstatus_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"schedules.label AS label", 
			"schedules_status.label AS schedulesstatus_label", 
			"schedules.created_at AS created_at", 
			"schedules.updated_at AS updated_at", 
			"schedules.id AS id", 
			"schedules_status.id AS schedulesstatus_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"schedules.id AS id", 
			"schedules.label AS label", 
			"schedules.created_at AS created_at", 
			"schedules.status AS status", 
			"schedules.updated_at AS updated_at", 
			"schedules_status.id AS schedulesstatus_id", 
			"schedules_status.label AS schedulesstatus_label" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"schedules.id AS id", 
			"schedules.label AS label", 
			"schedules.created_at AS created_at", 
			"schedules.status AS status", 
			"schedules.updated_at AS updated_at", 
			"schedules_status.id AS schedulesstatus_id", 
			"schedules_status.label AS schedulesstatus_label" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id", 
			"label", 
			"status" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
