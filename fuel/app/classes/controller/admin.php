<?php


class Controller_Admin extends Controller_Base {


    public function before()
    {
        parent::before();
        
        \Lang::load('users');
        
        
        // load the theme template
        $this->theme = \Theme::instance();
        $this->theme->active('admin');
        // set the page template
        $this->theme->set_template('layouts/default');
        $this->theme->set_partial('navigation', 'partials/navigation');
        $this->theme->set_partial('subnavigation', 'partials/subnavigation');
        //check that the user is logged in and has the permission to see the admin panel
        if(!\Warden::check() || (\Warden::check() && !\Warden::can(array('execute'), 'controlpanel')))
        {
            \Messages::error( \Lang::get('access_denied') );
            \Response::redirect('/');
        }
        
        
        //View::set_global('current_user', $this->current_user);


    }



}