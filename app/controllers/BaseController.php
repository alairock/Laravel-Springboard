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
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		$this->layout->siteName = $this->siteName;
	}

}
