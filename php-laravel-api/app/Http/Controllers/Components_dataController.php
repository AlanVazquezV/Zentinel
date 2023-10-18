<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components Data Contoller
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Controller
 */
class Components_dataController extends Controller{
	public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
	/**
     * employee_id_option_list Model Action
     * @return array
     */
	function employee_id_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,employee_number AS label FROM employees ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * status_option_list Model Action
     * @return array
     */
	function status_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM attendance_status ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * type_option_list Model Action
     * @return array
     */
	function type_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM biometric_types ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * status_option_list_2 Model Action
     * @return array
     */
	function status_option_list_2(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM biometric_status ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * position_id_option_list Model Action
     * @return array
     */
	function position_id_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,title AS label FROM positions ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * schedule_id_option_list Model Action
     * @return array
     */
	function schedule_id_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM schedules ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * status_option_list_3 Model Action
     * @return array
     */
	function status_option_list_3(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM employee_status ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * id_user_option_list Model Action
     * @return array
     */
	function id_user_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM role ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * attendance_id_option_list Model Action
     * @return array
     */
	function attendance_id_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,date AS label FROM attendance ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * status_option_list_4 Model Action
     * @return array
     */
	function status_option_list_4(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM incidents_status ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * id_option_list Model Action
     * @return array
     */
	function id_option_list(Request $request){
		$sqltext = "SELECT id as value, name as label FROM role";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * status_option_list_5 Model Action
     * @return array
     */
	function status_option_list_5(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM positions_status ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * check if username value already exist in Users
	 * @param string $value
     * @return bool
     */
	function users_username_exist(Request $request, $value){
		$exist = DB::table('users')->where('username', $value)->value('username');   
		if($exist){
			return "true";
		}
		return "false";
	}
}
