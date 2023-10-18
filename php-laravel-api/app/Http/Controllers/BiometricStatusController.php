<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\BiometricStatusAddRequest;
use App\Http\Requests\BiometricStatusEditRequest;
use App\Models\BiometricStatus;
use Illuminate\Http\Request;
use Exception;
class BiometricStatusController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = BiometricStatus::query();
		if($request->search){
			$search = trim($request->search);
			BiometricStatus::search($query, $search);
		}
		$orderby = $request->orderby ?? "biometric_status.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, BiometricStatus::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = BiometricStatus::query();
		$record = $query->findOrFail($rec_id, BiometricStatus::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(BiometricStatusAddRequest $request){
		$modeldata = $request->validated();
		
		//save BiometricStatus record
		$record = BiometricStatus::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(BiometricStatusEditRequest $request, $rec_id = null){
		$query = BiometricStatus::query();
		$record = $query->findOrFail($rec_id, BiometricStatus::editFields());
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
		$query = BiometricStatus::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent find before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		return $this->respond($arr_id);
	}
}
