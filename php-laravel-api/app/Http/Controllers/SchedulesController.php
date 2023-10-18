<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchedulesAddRequest;
use App\Http\Requests\SchedulesEditRequest;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Exception;
class SchedulesController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Schedules::query();
		if($request->search){
			$search = trim($request->search);
			Schedules::search($query, $search);
		}
		$query->join("schedules_status", "schedules.status", "=", "schedules_status.id");
		$orderby = $request->orderby ?? "schedules.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Schedules::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Schedules::query();
		$query->join("schedules_status", "schedules.status", "=", "schedules_status.id");
		$record = $query->findOrFail($rec_id, Schedules::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(SchedulesAddRequest $request){
		$modeldata = $request->validated();
		
		//save Schedules record
		$record = Schedules::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(SchedulesEditRequest $request, $rec_id = null){
		$query = Schedules::query();
		$record = $query->findOrFail($rec_id, Schedules::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
			$record->update($modeldata);
		}
		return $this->respond($record);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Schedules::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
