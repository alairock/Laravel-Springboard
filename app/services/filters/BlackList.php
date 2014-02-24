<?php namespace Services\Filters;

class BlackList extends Filter {

	public function filter() {
		//If we whitelisted the path, return page
		foreach ($this->whitelist as $path) {
			if($this->path == $path) {
				return;
			}
		}

		// At this point we should be logged in. Lets check
		// and redirect to login page if we aren't
		if (\Auth::guest()) {
			return \Redirect::guest('login');
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
