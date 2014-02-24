<?php

class BaseController extends Controller {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * The main site name which is appended to the title, and used elsewhere in the site.
     */
    protected $siteName = 'Inquiri';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		// Add correct theme if you are on the admin portion of the pages.
		if (strstr(Route::getCurrentRoute()->getPath(), '/', 1) == 'admin') {
			$this->layout = 'layouts.admin';
		}

		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		$this->layout->siteName = $this->siteName;
	}

}
