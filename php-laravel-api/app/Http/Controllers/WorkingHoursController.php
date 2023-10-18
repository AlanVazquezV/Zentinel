<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkingHoursAddRequest;
use App\Http\Requests\WorkingHoursEditRequest;
use App\Models\WorkingHours;
use Illuminate\Http\Request;
use Exception;
class WorkingHoursController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = WorkingHours::query();
		if($request->search){
			$search = trim($request->search);
			WorkingHours::search($query, $search);
		}
		$query->join("schedules", "working_hours.schedule_id", "=", "schedules.label");
		$orderby = $request->orderby ?? "working_hours.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, WorkingHours::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = WorkingHours::query();
		$query->join("schedules", "working_hours.schedule_id", "=", "schedules.label");
		$record = $query->findOrFail($rec_id, WorkingHours::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(WorkingHoursAddRequest $request){
		$modeldata = $request->validated();
		
		//save WorkingHours record
		$record = WorkingHours::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(WorkingHoursEditRequest $request, $rec_id = null){
		$query = WorkingHours::query();
		$record = $query->findOrFail($rec_id, WorkingHours::editFields());
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
		$query = WorkingHours::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent find before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		return $this->respond($arr_id);
	}
}
