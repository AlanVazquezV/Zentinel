<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Positions extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'positions';
	

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
	protected $fillable = ["title","parent","status"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				positions.title LIKE ?  OR 
				positions_status.label LIKE ?  OR 
				positions.id LIKE ?  OR 
				positions_status.id LIKE ? 
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
			"positions.title AS title", 
			"positions.parent AS parent", 
			"positions_status.label AS positionsstatus_label", 
			"positions.id AS id", 
			"positions_status.id AS positionsstatus_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"positions.title AS title", 
			"positions.parent AS parent", 
			"positions_status.label AS positionsstatus_label", 
			"positions.id AS id", 
			"positions_status.id AS positionsstatus_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"positions.title AS title", 
			"positions.parent AS parent", 
			"positions.created_at AS created_at", 
			"positions.updated_at AS updated_at", 
			"positions_status.label AS positionsstatus_label", 
			"positions.id AS id", 
			"positions_status.id AS positionsstatus_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"positions.title AS title", 
			"positions.parent AS parent", 
			"positions.created_at AS created_at", 
			"positions.updated_at AS updated_at", 
			"positions_status.label AS positionsstatus_label", 
			"positions.id AS id", 
			"positions_status.id AS positionsstatus_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"title", 
			"parent", 
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
