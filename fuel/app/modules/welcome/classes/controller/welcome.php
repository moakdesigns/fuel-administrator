<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */

namespace welcome;

class Controller_Welcome extends \Controller
{


	public function before()
	{

		parent::before();

		// load the theme template
        $this->theme = \Theme::instance();

        // set the page template
        $this->theme->set_template('layouts/homepage');

        // set the page title (can be chained to set_template() too)
        $this->theme->get_template()->set('title', 'My homepage');

	}


	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return \Theme::instance()
						->get_template()
						->set(	'content', 
								\Theme::instance()->view('welcome/index')
							);
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return \Response::forge(\ViewModel::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(\ViewModel::forge('welcome/404'), 404);
	}

	public function after($response)
    {
        // If no response object was returned by the action,
        if (empty($response) or  ! $response instanceof Response)
        {
            // render the defined template
            $response = \Response::forge(\Theme::instance()->render());
        }

        return parent::after($response);
    }
}