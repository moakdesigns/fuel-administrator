<?php


class Controller_Admin extends Controller_Base {


    public function before()
    {
        parent::before();
        
        \Lang::load('users');
        
        
        $this->template = Template::forge()->set_layout('default')->set_theme('admin');
        \Asset::set_theme('admin');

        //check that the user is logged in and has the permission to see the admin panel
        if(!\Warden::check() || (\Warden::check() && !\Warden::can(array('execute'), 'controlpanel')))
        {
            \Messages::error( \Lang::get('access_denied') );
            \Response::redirect('/');
        }
        
        
        //View::set_global('current_user', $this->current_user);


    }



}