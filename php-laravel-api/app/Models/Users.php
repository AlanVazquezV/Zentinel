<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Users extends Authenticatable 
{
	use Notifiable, HasApiTokens;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'users';
	

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
	protected $fillable = ["username","password","role_id"];
	/**
     * Table fields which are not included in select statement
     *
     * @var array
     */
	protected $hidden = ['password', 'token'];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				users.username LIKE ?  OR 
				role.name LIKE ?  OR 
				role.id LIKE ?  OR 
				role.description LIKE ?  OR 
				users.id LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"users.username AS username", 
			"role.name AS role_name", 
			"role.id AS role_id", 
			"users.id AS id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"users.username AS username", 
			"role.name AS role_name", 
			"role.id AS role_id", 
			"users.id AS id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"users.id AS id", 
			"users.username AS username", 
			"role.name AS role_name", 
			"role.id AS role_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"users.id AS id", 
			"users.username AS username", 
			"role.name AS role_name", 
			"role.id AS role_id" 
		];
	}
	

	/**
     * return accountedit page fields of the model.
     * 
     * @return array
     */
	public static function accounteditFields(){
		return [ 
			"id", 
			"username", 
			"role_id" 
		];
	}
	

	/**
     * return accountview page fields of the model.
     * 
     * @return array
     */
	public static function accountviewFields(){
		return [ 
			"id", 
			"username", 
			"created_at", 
			"updated_at", 
			"role_id" 
		];
	}
	

	/**
     * return exportAccountview page fields of the model.
     * 
     * @return array
     */
	public static function exportAccountviewFields(){
		return [ 
			"id", 
			"username", 
			"created_at", 
			"updated_at", 
			"role_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"username", 
			"role_id", 
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
     * Get current user name
     * @return string
     */
	public function UserName(){
		return $this->username;
	}
	

	/**
     * Get current user id
     * @return string
     */
	public function UserId(){
		return $this->id;
	}
	public function UserRole(){
		return $this->role_id;
	}
	
	private $roleNames = [];
	private $userPages = [];
	
	/**
	* Get the permissions of the user.
	*/
	public function permissions(){
		return $this->hasMany(Permissions::class, 'id', 'role_id');
	}
	
	/**
	* Get the roles of the user.
	*/
	public function roles(){
		return $this->hasMany(Role::class, 'id', 'role_id');
	}
	
	/**
	* set user role
	*/
	public function assignRole($roleName){
		$roleId = Role::select('id')->where('name', $roleName)->value('id');
		$this->role_id = $roleId;
		$this->save();
	}
	
	/**
     * return list of pages user can access
     * @return array
     */
	public function getUserPages(){
		if(empty($this->userPages)){ // ensure we make db query once
			$this->userPages = $this->permissions()->pluck('permission')->toArray();
		}
		return $this->userPages;
	}
	
	/**
     * return user role names
     * @return array
     */
	public function getRoleNames(){
		if(empty($this->roleNames)){// ensure we make db query once
			$this->roleNames = $this->roles()->pluck('name')->toArray();
		}
		return $this->roleNames;
	}
	
	/**
     * check if user has a role
     * @return bool
    */
	public function hasRole($arrRoles){
		if(!is_array($arrRoles)){
			$arrRoles = [$arrRoles];
		}
		$userRoles = $this->getRoleNames();
		if(array_intersect($userRoles, $arrRoles)){
			return true;
		}
		return false;
	}
	
	/**
     * check if user can access page
     * @return bool
     */
	public function canAccess($path){
		$userPages = $this->getUserPages();
		return in_array($path, $userPages);
	}
}
