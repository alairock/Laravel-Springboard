<?php

class RolesController extends BaseController {

	/**
	 * Role Repository
	 *
	 * @var Role
	 */
	protected $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::all();
        $this->layout->content = View::make('roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->content = View::make('roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$role = new Role();
		$role->name = Input::get('name');
		$role->save();
		return Redirect::to('/admin/roles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Role::find($id)->delete();
		return Redirect::to('/admin/roles');
	}

	/**
     * Attach permission to role
     *
     */
    public function attach_permission($id)
    {
        $role = Role::find($id);
        if (Request::isMethod('post') && $role) {
            $permissionId = Input::get('permissions');
            if (count(Role::find($id)->perms()->where('permissions.id', '=', $permissionId)->get())) {
                return Redirect::back()->withError('The role already has this permission.');
            }
            $role->attachPermission($permissionId);
            return Redirect::back()->withMessage('Successfully attached permission to role');
        }

        $permissions = Permission::all();
        $permissionsList = [];
        foreach ($permissions as $permission) {
            $permissionsList[$permission->id] = $permission->name . ' : ' . $permission->method;
        }

        if (empty($permissionsList)) {
        	return Redirect::back()->withError('No permissions exist. You need to create them.');
        }

        $myPermissions = Role::find($id)->perms;
        $this->layout->content = View::make('roles.attach_permission')->with(compact('role', 'permissionsList', 'myPermissions'));
    }

    /**
     * Revoke a users role
     *
     */
    public function revoke_permission($role_id, $permission_id)
    {
        $role = Role::findOrFail($role_id);
        $result = $role->perms()->detach($permission_id);
        return Redirect::back()->withMessage('Revoked Permission');
    }

}
