<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// api routes that need auth

Route::middleware(['auth:api', 'rbac'])->group(function () {


/* routes for Attendance Controller  */	
	Route::get('attendance', 'AttendanceController@index');
	Route::get('attendance/index', 'AttendanceController@index');
	Route::get('attendance/index/{filter?}/{filtervalue?}', 'AttendanceController@index');	
	Route::get('attendance/view/{rec_id}', 'AttendanceController@view');	
	Route::post('attendance/add', 'AttendanceController@add');	
	Route::any('attendance/edit/{rec_id}', 'AttendanceController@edit');	
	Route::any('attendance/delete/{rec_id}', 'AttendanceController@delete');

/* routes for AttendanceStatus Controller  */	
	Route::get('attendancestatus', 'AttendanceStatusController@index');
	Route::get('attendancestatus/index', 'AttendanceStatusController@index');
	Route::get('attendancestatus/index/{filter?}/{filtervalue?}', 'AttendanceStatusController@index');	
	Route::get('attendancestatus/view/{rec_id}', 'AttendanceStatusController@view');	
	Route::post('attendancestatus/add', 'AttendanceStatusController@add');	
	Route::any('attendancestatus/edit/{rec_id}', 'AttendanceStatusController@edit');	
	Route::any('attendancestatus/delete/{rec_id}', 'AttendanceStatusController@delete');

/* routes for Biometrics Controller  */	
	Route::get('biometrics', 'BiometricsController@index');
	Route::get('biometrics/index', 'BiometricsController@index');
	Route::get('biometrics/index/{filter?}/{filtervalue?}', 'BiometricsController@index');	
	Route::get('biometrics/view/{rec_id}', 'BiometricsController@view');	
	Route::post('biometrics/add', 'BiometricsController@add');	
	Route::any('biometrics/edit/{rec_id}', 'BiometricsController@edit');	
	Route::any('biometrics/delete/{rec_id}', 'BiometricsController@delete');

/* routes for BiometricStatus Controller  */	
	Route::get('biometricstatus', 'BiometricStatusController@index');
	Route::get('biometricstatus/index', 'BiometricStatusController@index');
	Route::get('biometricstatus/index/{filter?}/{filtervalue?}', 'BiometricStatusController@index');	
	Route::get('biometricstatus/view/{rec_id}', 'BiometricStatusController@view');	
	Route::post('biometricstatus/add', 'BiometricStatusController@add');	
	Route::any('biometricstatus/edit/{rec_id}', 'BiometricStatusController@edit');	
	Route::any('biometricstatus/delete/{rec_id}', 'BiometricStatusController@delete');

/* routes for BiometricTypes Controller  */	
	Route::get('biometrictypes', 'BiometricTypesController@index');
	Route::get('biometrictypes/index', 'BiometricTypesController@index');
	Route::get('biometrictypes/index/{filter?}/{filtervalue?}', 'BiometricTypesController@index');	
	Route::get('biometrictypes/view/{rec_id}', 'BiometricTypesController@view');	
	Route::post('biometrictypes/add', 'BiometricTypesController@add');	
	Route::any('biometrictypes/edit/{rec_id}', 'BiometricTypesController@edit');	
	Route::any('biometrictypes/delete/{rec_id}', 'BiometricTypesController@delete');

/* routes for Employees Controller  */	
	Route::get('employees', 'EmployeesController@index');
	Route::get('employees/index', 'EmployeesController@index');
	Route::get('employees/index/{filter?}/{filtervalue?}', 'EmployeesController@index');	
	Route::get('employees/view/{rec_id}', 'EmployeesController@view');	
	Route::post('employees/add', 'EmployeesController@add');	
	Route::any('employees/edit/{rec_id}', 'EmployeesController@edit');	
	Route::any('employees/delete/{rec_id}', 'EmployeesController@delete');

/* routes for EmployeeStatus Controller  */	
	Route::get('employeestatus', 'EmployeeStatusController@index');
	Route::get('employeestatus/index', 'EmployeeStatusController@index');
	Route::get('employeestatus/index/{filter?}/{filtervalue?}', 'EmployeeStatusController@index');	
	Route::get('employeestatus/view/{rec_id}', 'EmployeeStatusController@view');	
	Route::post('employeestatus/add', 'EmployeeStatusController@add');	
	Route::any('employeestatus/edit/{rec_id}', 'EmployeeStatusController@edit');	
	Route::any('employeestatus/delete/{rec_id}', 'EmployeeStatusController@delete');

/* routes for Incidents Controller  */	
	Route::get('incidents', 'IncidentsController@index');
	Route::get('incidents/index', 'IncidentsController@index');
	Route::get('incidents/index/{filter?}/{filtervalue?}', 'IncidentsController@index');	
	Route::get('incidents/view/{rec_id}', 'IncidentsController@view');	
	Route::post('incidents/add', 'IncidentsController@add');	
	Route::any('incidents/edit/{rec_id}', 'IncidentsController@edit');	
	Route::any('incidents/delete/{rec_id}', 'IncidentsController@delete');

/* routes for IncidentsStatus Controller  */	
	Route::get('incidentsstatus', 'IncidentsStatusController@index');
	Route::get('incidentsstatus/index', 'IncidentsStatusController@index');
	Route::get('incidentsstatus/index/{filter?}/{filtervalue?}', 'IncidentsStatusController@index');	
	Route::get('incidentsstatus/view/{rec_id}', 'IncidentsStatusController@view');	
	Route::post('incidentsstatus/add', 'IncidentsStatusController@add');	
	Route::any('incidentsstatus/edit/{rec_id}', 'IncidentsStatusController@edit');	
	Route::any('incidentsstatus/delete/{rec_id}', 'IncidentsStatusController@delete');

/* routes for Permissions Controller  */	
	Route::get('permissions', 'PermissionsController@index');
	Route::get('permissions/index', 'PermissionsController@index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view');	
	Route::post('permissions/add', 'PermissionsController@add');	
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit');	
	Route::any('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Positions Controller  */	
	Route::get('positions', 'PositionsController@index');
	Route::get('positions/index', 'PositionsController@index');
	Route::get('positions/index/{filter?}/{filtervalue?}', 'PositionsController@index');	
	Route::get('positions/view/{rec_id}', 'PositionsController@view');	
	Route::post('positions/add', 'PositionsController@add');	
	Route::any('positions/edit/{rec_id}', 'PositionsController@edit');	
	Route::any('positions/delete/{rec_id}', 'PositionsController@delete');

/* routes for PositionsStatus Controller  */	
	Route::get('positionsstatus', 'PositionsStatusController@index');
	Route::get('positionsstatus/index', 'PositionsStatusController@index');
	Route::get('positionsstatus/index/{filter?}/{filtervalue?}', 'PositionsStatusController@index');	
	Route::get('positionsstatus/view/{rec_id}', 'PositionsStatusController@view');	
	Route::post('positionsstatus/add', 'PositionsStatusController@add');	
	Route::any('positionsstatus/edit/{rec_id}', 'PositionsStatusController@edit');	
	Route::any('positionsstatus/delete/{rec_id}', 'PositionsStatusController@delete');

/* routes for Role Controller  */	
	Route::get('role', 'RoleController@index');
	Route::get('role/index', 'RoleController@index');
	Route::get('role/index/{filter?}/{filtervalue?}', 'RoleController@index');	
	Route::get('role/view/{rec_id}', 'RoleController@view');	
	Route::post('role/add', 'RoleController@add');	
	Route::any('role/edit/{rec_id}', 'RoleController@edit');	
	Route::any('role/delete/{rec_id}', 'RoleController@delete');

/* routes for Schedules Controller  */	
	Route::get('schedules', 'SchedulesController@index');
	Route::get('schedules/index', 'SchedulesController@index');
	Route::get('schedules/index/{filter?}/{filtervalue?}', 'SchedulesController@index');	
	Route::get('schedules/view/{rec_id}', 'SchedulesController@view');	
	Route::post('schedules/add', 'SchedulesController@add');	
	Route::any('schedules/edit/{rec_id}', 'SchedulesController@edit');	
	Route::any('schedules/delete/{rec_id}', 'SchedulesController@delete');

/* routes for SchedulesStatus Controller  */	
	Route::get('schedulesstatus', 'SchedulesStatusController@index');
	Route::get('schedulesstatus/index', 'SchedulesStatusController@index');
	Route::get('schedulesstatus/index/{filter?}/{filtervalue?}', 'SchedulesStatusController@index');	
	Route::get('schedulesstatus/view/{rec_id}', 'SchedulesStatusController@view');	
	Route::post('schedulesstatus/add', 'SchedulesStatusController@add');	
	Route::any('schedulesstatus/edit/{rec_id}', 'SchedulesStatusController@edit');	
	Route::any('schedulesstatus/delete/{rec_id}', 'SchedulesStatusController@delete');

/* routes for Users Controller  */	
	Route::get('users', 'UsersController@index');
	Route::get('users/index', 'UsersController@index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index');	
	Route::get('users/view/{rec_id}', 'UsersController@view');	
	Route::any('account/edit', 'AccountController@edit');	
	Route::get('account', 'AccountController@index');	
	Route::get('account/currentuserdata', 'AccountController@currentuserdata');	
	Route::post('users/add', 'UsersController@add');	
	Route::any('users/edit/{rec_id}', 'UsersController@edit');	
	Route::any('users/delete/{rec_id}', 'UsersController@delete');

/* routes for WorkingHours Controller  */	
	Route::get('workinghours', 'WorkingHoursController@index');
	Route::get('workinghours/index', 'WorkingHoursController@index');
	Route::get('workinghours/index/{filter?}/{filtervalue?}', 'WorkingHoursController@index');	
	Route::get('workinghours/view/{rec_id}', 'WorkingHoursController@view');	
	Route::post('workinghours/add', 'WorkingHoursController@add');	
	Route::any('workinghours/edit/{rec_id}', 'WorkingHoursController@edit');	
	Route::any('workinghours/delete/{rec_id}', 'WorkingHoursController@delete');

});

Route::get('home', 'HomeController@index');
	
	Route::post('auth/login', 'AuthController@login');
	Route::get('login', 'AuthController@login')->name('login');
	
	
	Route::get('components_data/employee_id_option_list/{arg1?}', 'Components_dataController@employee_id_option_list');	
	Route::get('components_data/status_option_list/{arg1?}', 'Components_dataController@status_option_list');	
	Route::get('components_data/type_option_list/{arg1?}', 'Components_dataController@type_option_list');	
	Route::get('components_data/status_option_list_2/{arg1?}', 'Components_dataController@status_option_list_2');	
	Route::get('components_data/position_id_option_list/{arg1?}', 'Components_dataController@position_id_option_list');	
	Route::get('components_data/schedule_id_option_list/{arg1?}', 'Components_dataController@schedule_id_option_list');	
	Route::get('components_data/status_option_list_3/{arg1?}', 'Components_dataController@status_option_list_3');	
	Route::get('components_data/id_user_option_list/{arg1?}', 'Components_dataController@id_user_option_list');	
	Route::get('components_data/attendance_id_option_list/{arg1?}', 'Components_dataController@attendance_id_option_list');	
	Route::get('components_data/status_option_list_4/{arg1?}', 'Components_dataController@status_option_list_4');	
	Route::get('components_data/id_option_list/{arg1?}', 'Components_dataController@id_option_list');	
	Route::get('components_data/status_option_list_5/{arg1?}', 'Components_dataController@status_option_list_5');	
	Route::get('components_data/users_username_exist/{arg1?}', 'Components_dataController@users_username_exist');


/* routes for FileUpload Controller  */	
Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');