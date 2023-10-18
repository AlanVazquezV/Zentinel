<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceAddRequest;
use App\Http\Requests\AttendanceEditRequest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Exception;
class AttendanceController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Attendance::query();
		if($request->search){
			$search = trim($request->search);
			Attendance::search($query, $search);
		}
		$query->join("employees", "attendance.employee_id", "=", "employees.id");
		$query->join("attendance_status", "attendance.status", "=", "attendance_status.id");
		$orderby = $request->orderby ?? "attendance.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Attendance::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Attendance::query();
		$query->join("employees", "attendance.employee_id", "=", "employees.id");
		$query->join("attendance_status", "attendance.status", "=", "attendance_status.id");
		$record = $query->findOrFail($rec_id, Attendance::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(AttendanceAddRequest $request){
		$modeldata = $request->validated();
		
		//save Attendance record
		$record = Attendance::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AttendanceEditRequest $request, $rec_id = null){
		$query = Attendance::query();
		$record = $query->findOrFail($rec_id, Attendance::editFields());
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
		$query = Attendance::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
