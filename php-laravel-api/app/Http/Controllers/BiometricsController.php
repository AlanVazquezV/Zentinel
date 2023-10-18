<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\BiometricsAddRequest;
use App\Http\Requests\BiometricsEditRequest;
use App\Models\Biometrics;
use Illuminate\Http\Request;
use Exception;
class BiometricsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Biometrics::query();
		if($request->search){
			$search = trim($request->search);
			Biometrics::search($query, $search);
		}
		$query->join("employees", "biometrics.employee_id", "=", "employees.id");
		$query->join("biometric_status", "biometrics.status", "=", "biometric_status.id");
		$query->join("biometric_types", "biometrics.type", "=", "biometric_types.id");
		$orderby = $request->orderby ?? "biometrics.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Biometrics::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Biometrics::query();
		$query->join("employees", "biometrics.employee_id", "=", "employees.id");
		$query->join("biometric_status", "biometrics.status", "=", "biometric_status.id");
		$query->join("biometric_types", "biometrics.type", "=", "biometric_types.id");
		$record = $query->findOrFail($rec_id, Biometrics::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(BiometricsAddRequest $request){
		$modeldata = $request->validated();
		
		//save Biometrics record
		$record = Biometrics::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(BiometricsEditRequest $request, $rec_id = null){
		$query = Biometrics::query();
		$record = $query->findOrFail($rec_id, Biometrics::editFields());
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
		$query = Biometrics::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent find before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		return $this->respond($arr_id);
	}
}
