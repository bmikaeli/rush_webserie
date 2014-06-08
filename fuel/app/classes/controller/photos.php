<?php
class Controller_Photos extends Controller_Base{

    public function action_index()
    {

        $this->template->title = "Photos de tournage";
        $data['photos'] = Model_Photos::find('all');
        $this->template->content = View::forge('photos/index', $data);
    }

    public function action_create()
    {
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('news');
        }

        if (Input::method() == 'POST')
        {
            $val = Model_Photos::validate('create');
            if ($val->run())
            {
                $rush = Model_Photos::forge(array(
                    'name' => isset ($_FILES['filename']['name']) ? $_FILES['filename']['name'] : 'rien',
                ));
                if ( $_FILES['filename']['name'])
                {
                    $config = array(
                        'path' => 'assets/img/photos/',
                        'ext_whitelist' => array('img', 'jpg', 'png', 'gif', 'jpeg'),
                    );
                    Upload::process($config);
                    if (Upload::is_Valid())
                        Upload::save();
                    else
                    {
                        Session::set_flash('error', e('Could not save news.'));
                        Response::redirect('photos');
                    }
                }
                if ($rush and $rush->save())
                {
                    Session::set_flash('success', e('Added photos #'.$rush->id.'.'));
                    Response::redirect('photos');
                }
                else
                    Session::set_flash('error', e('Could not save news.'));
            }
            else
                Session::set_flash('error', $val->error());
         }
        $this->template->title = "Photos de tournage";
        $this->template->content = View::forge('photos/create');


    }
    public function action_delete($id = null)
    {
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('photos');
        }
        if ($rush = Model_Photos::find($id))
        {
            $rush->delete();

            Session::set_flash('success', e('Deleted rush #'.$id));
        }

        else
        {
            Session::set_flash('error', e('Could not delete rush #'.$id));
        }

        Response::redirect('photos');

    }
}