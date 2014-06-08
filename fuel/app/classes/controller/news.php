<?php
class Controller_News extends Controller_Base{

	public function action_index()
	{
		$data['rushes'] = Model_Rush::find('all');
		$data['users'] = Model_User::find('all');
        rsort($data['rushes']);
		$this->template->title = "News";
		$this->template->content = View::forge('news/index', $data);
	}

	public function action_view($id = null)
	{
		$data['rush'] = Model_Rush::find($id);

		$this->template->title = "Rush";
		$this->template->content = View::forge('news/view', $data);

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
		    $val = Model_Rush::validate('create');
			if ($val->run())
			{

				$rush = Model_Rush::forge(array(
					'title' => Input::post('title'),
                    'picture' => isset ($_FILES['filename']['name']) ? $_FILES['filename']['name'] : 'rien',
					'body' => Input::post('body'),
					'user_id' => $this->current_user->id,
				));

                if ( $_FILES['filename']['name'])
                {

                    $config = array(
                        'path' => 'assets/img/news/',
                        'ext_whitelist' => array('img', 'jpg', 'png', 'gif', 'jpeg'),
                    );


                    Upload::process($config);

                    if(Upload::is_Valid())
                    {
                        Upload::save();
                    }
                    else
                    {
                        Session::set_flash('error', e('Could not save news.'));
                        Response::redirect('news');

                    }
                }

                if ($rush and $rush->save())
				{
					Session::set_flash('success', e('Added news #'.$rush->id.'.'));
					Response::redirect('news');
				}

				else
				{
					Session::set_flash('error', e('Could not save news.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Rushes";
		$this->template->content = View::forge('news/create');

	}

	public function action_edit($id = null)
	{
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('news');
        }
		$rush = Model_Rush::find($id);
		$val = Model_Rush::validate('edit');

		if ($val->run())
		{
			$rush->title = Input::post('title');
			$rush->slug = Input::post('slug');
			$rush->summary = Input::post('summary');
			$rush->body = Input::post('body');
			$rush->user_id = $this->current_user->id;


			if ($rush->save())
			{
				Session::set_flash('success', e('Updated news #' . $id));

				Response::redirect('news');
			}

			else
			{
				Session::set_flash('error', e('Could not update news #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$rush->title = $val->validated('title');
				$rush->slug = $val->validated('slug');
				$rush->summary = $val->validated('summary');
				$rush->body = $val->validated('body');
				$rush->user_id = $this->current_user->id;


				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('rush', $rush, false);
		}

		$this->template->title = "Edit news";
		$this->template->content = View::forge('news/edit');

	}

	public function action_delete($id = null)
	{
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('news');
        }
		if ($rush = Model_Rush::find($id))
		{
			$rush->delete();

			Session::set_flash('success', e('Deleted rush #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete rush #'.$id));
		}

		Response::redirect('news');

	}


}