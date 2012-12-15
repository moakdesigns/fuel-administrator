<?php

namespace Menu;

class Controller_Menu extends \Fuel\Core\Controller 
{

    public function action_index()
    {

        $categories         = \Menu\Model_Categories::find('all');
            
        foreach ($categories as $category)
        {
            
            $data['menues'][$category->id] = array(
                                                    'catid' => $category->id, 
                                                    'catname' => $category->catname, 
                                                    'alias' => $category->alias
                                                  );
            
            $data['menues'][$category->id]['menu'] = $this->action_getMenu($category->id, true);
        }

        return \Response::forge(\View::forge('menu/index', $data));

    }
	
    public function action_getMenu($catid, $isAdmin=false, $parent=0, $level=0, $init=true, &$menu_entries=array())
    {
        
        if($isAdmin == false)
        {
            if($init==true)
            {
                $menu_entries[0] = "none";
            }

            if($catid == null || $catid == false)
            {
                return $menu_entries;
            }

            $current_level = \Menu\Model_Menu::get_Menu($catid, $parent);

            foreach($current_level as $entry) 
            { 
                $menu_entries[$entry['id']] = str_repeat('&nbsp;&nbsp;&nbsp;',$level).$entry['title'];
                $this->action_getMenu($catid, $isAdmin, $entry['id'] , $level+1, false, $menu_entries); 
            } 

            return $menu_entries;
        }
        else
        {
            $current_level = \Menu\Model_Menu::get_Menu($catid, $parent);

            foreach($current_level as $entry) 
            { 

                $menu_entries[] =  array(
                                        'id'        => $entry['id'], 
                                        'name'      => str_repeat('&nbsp;&nbsp;&nbsp;',$level).$entry['title'],
                                        'link'      => $entry['link'],
                                        'divider'   => $entry['divider'],
                                        'position'  => $entry['position']
                                        );
                $this->action_getMenu($catid, $isAdmin, $entry['id'] , $level+1, false, $menu_entries); 
                 
            } 

            return $menu_entries;
        }
    }

    public function action_create($catid = null)
    {
        if (\Input::method() == 'POST')
        {
            $menu = Model_Menu::forge(array(
                    'title'     => \Input::post('title'),
                    'parent'    => \Input::post('parent'),
                    'position'  => \Input::post('position'),
                    'link'      => \Input::post('link'),
                    'catid'     => \Input::post('catid'),
                    'active'    => \Input::post('active', 0),
                    'divider'   => \Input::post('divider', 0),
                    'menuicon'  => \Input::post('menuicon', 'none')
            ));

            if ($menu && $menu->save())
            {
                \Session::set_flash('success','Added Menu entry #'.$menu->id.'.');
                \Response::redirect('menu');
            }

            else
            {
                \Session::set_flash('error','Could not add menu entry.');
            }
        }


        $all_categories_obj         = \Menu\Model_Categories::find('all');

        foreach ($all_categories_obj as $i => $obj)
        {
            $all_categories_arr[$i] = $obj->to_array();
        }
        
        foreach ($all_categories_arr as $value) 
        {
            $all_categories[$value['id']] = $value['catname'];
        }

        $data['categories']  = $all_categories;
        $data['parent_links']   = $this->action_getMenu(($catid == null) ? key($all_categories) : $catid);
        
        return \Response::forge(\View::forge('menu/create', $data));

    }
    
    public function action_edit($id = null)
    {
        $menu                   = \Menu\Model_Menu::find_by_id($id);

        if (\Input::method() == 'POST')
        {

            $menu->title        = \Input::post('title');
            $menu->parent       = \Input::post('parent');
            $menu->position     = \Input::post('position');
            $menu->link         = \Input::post('link');
            $menu->catid        = \Input::post('catid');
            $menu->active       = \Input::post('active');
            $menu->divider      = \Input::post('divider');
            $menu->menuicon     = \Input::post('menuicon', 'none');


            if ($menu->save())
            {
                \Session::set_flash('success','Updated menu #' . $id);

                \Response::redirect('menu');
            }

            else
            {
                    \Session::set_flash('warning','Nothing updated.');
            }
        }

        $all_categories_obj     = \Menu\Model_Categories::find('all');
        foreach ($all_categories_obj as $i => $obj)
        {
            $all_categories_arr[$i] = $obj->to_array();
        }

        foreach ($all_categories_arr as $value) 
        {
            $all_categories[$value['id']] = $value['catname'];
        }

        $data['categories']     = $all_categories;
        $data['parent_links']   = $this->action_getMenu($menu->catid);

        $data['menu']           = $menu;
        return \Response::forge(\View::forge('menu/edit', $data));

    }

    public function action_delete($id = null)
    {
        $menu = \Menu\Model_Menu::find_by_id($id);

        if ($menu && $menu->delete())
        {
            \Session::set_flash('success','Deleted menu entry #'.$id);
        }
        else
        {
            \Session::set_flash('error','Could not delete menu entry #'.$id);
        }

        \Response::redirect('menu');

    }
    
    public function action_create_category($catid = null)
    {
        if (\Input::method() == 'POST')
        {
            $category = \Menu\Model_Categories::forge(array(
                    'catname'   => \Input::post('catname'),
                    'alias'     => \Input::post('alias')
            ));

            if ($category && $category->save())
            {
                \Session::set_flash('success','Added Menu category entry #'.$category->id.'.');
                \Response::redirect('menu');
            }

            else
            {
                \Session::set_flash('error','Could not add menu category entry.');
            }
        }

        return \Response::forge(\View::forge('menu/create_category'));

    }
    
    public function action_edit_category($id = null)
    {
        $category = \Menu\Model_Categories::find_by_id($id);

        if (\Input::method() == 'POST')
        {

            $category->catname      = \Input::post('catname');
            $category->alias        = \Input::post('alias');

            if ($category->save())
            {
                \Session::set_flash('success', 'Updated category #' . $id);    
                \Response::redirect('menu');
            }

            else
            {
                \Session::set_flash('warning', 'Nothing updated.');
            }
        }
        $data['category'] = $category;
        return \Response::forge(\View::forge('menu/edit_category', $data));

    }

    public function action_delete_category($id = null)
    {
        $menu = \Menu\Model_Menu::find_by_id($id);

        if ($menu && $menu->delete())
        {
            \Session::set_flash('success','Deleted menu entry #'.$id);
        }

        else
        {
            \Session::set_flash('error','Could not delete menu entry #'.$id);
        }

        \Response::redirect('menu');

    }
}