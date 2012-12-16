<?php

namespace Users;

class Controller_Admin_Users extends \Controller_Admin 
{

    public function before()
    {
        parent::before();
    }

	public function action_index()
	{
            if(!\Warden::can(array('create', 'update', 'delete'), 'users'))
            {
                \Messages::warning('Ups. You have not the permission to do this action.');
                \Fuel\Core\Response::redirect('/admin');
            }
            
            
            
            $config = array(
                        'pagination_url' => \Fuel\Core\Uri::base().'admin/users/index/',
                        'total_items' => count(\Warden\Model_User::find('all')),
                        'per_page' => 20,
                        'uri_segment' => 4

                    );
            $pagination = \Pagination::forge('users_pagination', $config);
		  $data['users'] = \Warden\Model_User::find('all',array(
                                                            'limit' => $pagination->per_page,
                                                            'offset' => $pagination->offset)
                                                         );
                
                
               

                
                                                

                
                $data['pagination'] = $pagination->render();
                $partial    = array();
                //$this->template->set_partial('subnavigation', 'subnavigation', $partial );
                //$this->template->title("Manage Users");
		//$this->template->build('admin/users/index', $data);

        \Theme::instance()->set_partial('subnavigation', 'partials/subnavigation');

        return \Theme::instance()
                        ->get_template()
                        ->set(  'content', 
                                \Theme::instance()->view('admin/users/index', $data)
                            );

	}


	public function action_create($id = null)
	{
            if(!\Warden::can(array('create', 'update', 'delete'), 'users'))
            {
                \Messages::warning('Ups. You have not the permission to do this action.');
                \Fuel\Core\Response::redirect('/');
            }
                $user = new \Warden\Model_User();
                
                $roles = \Warden\Model_Role::find()->get();
                
                $userroles = array();
                foreach($roles as $key => $value)
                {             
                    $userroles[$key] = $value->name;
                }
                
		if (\Input::method() == 'POST')
		{
			
            
                    $val = \Validation::forge();
                    $val->add_callable('myvalidation');
                    $val->add_field('username', 'Username', 'required|min_length[3]|max_length[20]|unique[users.username]');
                    $val->add_field('password', 'Password', 'required|min_length[6]|max_length[20]');
                    $val->add_field('email', 'E-Mail', 'required|valid_email|unique[users.email]');
                    if ( $val->run() )
                    {
                        $user = new \Warden\Model_User(array(
                                'username' => $val->validated('username'),
                                'password' => $val->validated('password'),
                                'email'	   => $val->validated('email'),
                        ));

                        if( $user->save() )
                        {
                            foreach (\Input::post('role') as $selected_role) 
                            {
                                //\Debug::dump("post: ",$selected_role);
                                $user->roles[$selected_role] = \Model_Role::find((int)$selected_role);
                            }
                            $user->save();
                            \Messages::success('Account successfully created.');
                            \Response::redirect('users/admin/users');
                        }
                        else
                        {
                            \Messages::error('Ups. Something going wrong, please try again.');
                        }
                    }
                    else
                    {
                            \Messages::error($val->error());
                    }
                }
                
                $data['user'] = $user;
                $this->template->set_global('roles', $userroles, false);
		
                $this->template->title("Create Users");
		$this->template->build('admin/users/create', $data);


	}
   
        public function action_edit($id = null)
	{
            if(!\Warden::can(array('create', 'update', 'delete'), 'users'))
            {
                \Messages::warning('Ups. You have not the permission to do this action.');
                \Fuel\Core\Response::redirect('/');
            }
            
            $user   = \Warden\Model_User::find_by_id($id);
            $roles = \Warden\Model_Role::find()->get();

            $userroles = array();
            foreach($roles as $key => $value)
            {
                $userroles[$key] = $value->name;
            }
            
            
            
            if (\Input::method() == 'POST')
            {
                $user = \Warden\Model_User::find_by_id($id);
               
                $val = \Validation::forge();
                $val->add_callable('myvalidation');

                if(\Input::post('username'))
                {
                    $val->add_field('username', 'Username', 'required|min_length[3]|max_length[20]');
                }

                if(\Input::post('email'))
                {
                    $val->add_field('email', 'E-Mail', 'required|valid_email');
                }

                if($val->run())
                {
                    
                    $user->username     = \Input::post('username');
                    $user->email	= \Input::post('email');
                    $user->is_confirmed = (\Input::post('is_confirmed') == 1) ? 1 : 0;
                    
                    if(\Input::post('password'))
                    {
                        $user->encrypted_password  =  \Warden::encrypt_password( \Input::post('password') );
                    }
                    
                    
                    
                    try
                    {
                        if($user->save())
                        {
                            \Debug::dump("Post: ",\Input::post('role'));
                            \Debug::dump("Before unset: ",$user->roles);
                            unset($user->roles);
                            \Debug::dump("After unset: ",$user->roles);

                            foreach (\Input::post('role') as $selected_role) 
                            {
                                \Debug::dump("post: ",$selected_role);
                                $user->roles[$selected_role] = \Model_Role::find((int)$selected_role);
                            }

                            \Debug::dump("After set: ",$user->roles); 
                           
                            
                            $user->save();
                            \Debug::dump($user);
                            
                            
                            \Messages::success('Updated user #' . $id);
                           // \Response::redirect('admin/users');
                        }
                        else
                        {
                            \Messages::warning("Nothing changed.");
                        }
                        
                    }
                    catch (\Orm\ValidationFailed $e)
                    {
                        \Messages::error($e->getMessage());
                    }
                } 
                else
                {
                    \Messages::error($val->error());
                }
                
               
            }

            
            $this->template->set_global('user', $user, false);
            $this->template->set_global('roles', $userroles, false);
            
            
            \Breadcrumb::set("Edit User: ".$user->username,"",3);
            $this->template->title("Edit User: ".$user->username);
            $this->template->build('admin/users/edit');


	}
            


	public function action_delete($id = null)
	{
            if(!\Warden::can(array('create', 'update', 'delete'), 'users'))
            {
                \Messages::warning('Ups. You have not the permission to do this action.');
                \Fuel\Core\Response::redirect('/');
            }
		if ($user = \Warden\Model_User::find_by_id($id))
		{
			$user->delete();

			\Messages::success('Deleted user #'.$id);
		}

		else
		{
			\Messages::error('Could not delete user #'.$id);
		}
                
                \Response::redirect('admin/users');
                


                
	}
        
        public function action_activate($id = null)
	{
            if(!\Warden::can(array('create', 'update', 'delete'), 'users'))
            {
                \Messages::set_flash('notice', 'Ups. You have not the permission to do this action.');
                \Fuel\Core\Response::redirect('/');
            }
		$user = \Warden\Model_User::find_by_id($id);

		$user->is_confirmed = 1;
                $user->confirmation_token = NULL;
                if ($user->save())
                {
                        \Messages::success('User activated!');

                        \Response::redirect('admin/users');
                }

                else
                {
                        \Messages::error('Ups, something going wrong.');
                        \Response::redirect('admin/users');
                }
		
                \Response::redirect('admin/users');



	}
        public function action_deactivate($id = null)
	{
            if(!\Warden::can(array('create', 'update', 'delete'), 'users'))
            {
                \Messages::set_flash('notice', 'Ups. You have not the permission to do this action.');
                \Fuel\Core\Response::redirect('/');
            }
		$user = \Warden\Model_User::find_by_id($id);

		$user->is_confirmed = 0;
                $user->confirmation_token = NULL;
                if ($user->save())
                {
                        \Messages::success('User deactivated!');

                        \Response::redirect('admin/users');
                }

                else
                {
                        \Messages::error('Ups, something going wrong.');
                        \Response::redirect('admin/users');
                }
	}

        
        

}