<?php namespace Services\Filters;

class BlackList extends Filter {

	public function filter() {
		//If we whitelisted the path, return page
		foreach ($this->whitelist as $path) {
			if($this->path == $path) {
				return;
			}
		}
		//If we are the super admin, we can anything
		if (\Entrust::hasRole('Super Admin')) {
			return;
		}

		// If the user has been given permission based on the role, return page
		$user = \Auth::user();
		if ($user->can($this->path)) {
			return;
		}

		// \App::abort(404);
		return \Redirect::intended("/")->withError('Hey now! You don\'t have access to that page!');
	}

}
