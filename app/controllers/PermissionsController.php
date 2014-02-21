<?php

class PermissionsController extends BaseController {

	/**
	 * Permission Repository
	 *
	 * @var Permission
	 */
	protected $permission;

	public function __construct(Permission $permission)
	{
		$this->permission = $permission;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = Permission::all();
        $this->layout->content = View::make('permissions.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$allRoutes = [];
		foreach (Route::getRoutes() as $route) {
			$allRoutes[$route->getPath()] = $route->getPath();
		}
		$methodOptions = ['GET' => 'GET', 'POST' => 'POST', 'PUT' => 'PUT', 'PATCH' => 'PATCH', 'DELETE' => 'DELETE'];
        $this->layout->content = View::make('permissions.create', compact('allRoutes', 'methodOptions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validation = new Services\Validators\Permission;

		if ($validation->passes())
		{
			Permission::create(Input::all());

			return Redirect::to('/admin/permissions')->withMessage('Successfully saved permission');
		}

		return Redirect::back()->withInput()->withErrors($validation->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Permission::find($id)->delete();
		return Redirect::to('/admin/permissions');
	}

}
