<?php
class Controller_Episodes extends Controller_Base{

	public function action_index()
	{
		$data['rushes'] = Model_Episodes::find('all');
		$this->template->title = "Episodes";
		$this->template->content = View::forge('episodes/index', $data);

	}

	public function action_view($id = null)
	{
		$data['rush'] = Model_Episodes::find($id);
		$this->template->title = $data['rush']->title;
		$this->template->content = View::forge('episodes/view', $data);
	}

	public function action_create()
	{
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('episodes');
        }
		if (Input::method() == 'POST')
		{
			$val = Model_Episodes::validate('create');

			if ($val->run())
			{
				$episode = Model_Episodes::forge(array(
					'title' => Input::post('title'),
                    'user_id' => Auth::get_id(),
					'youtube' => Input::post('youtube'),
				));

				if ($episode and $episode->save())
				{
					Session::set_flash('success', e('Added episodes #'.$episode->id.'.'));

					Response::redirect('episodes');
				}

				else
				{
					Session::set_flash('error', e('Could not save episode.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Ajouter un episode";
		$this->template->content = View::forge('episodes/create');

	}

	public function action_edit($id = null)
	{
		$rush = Model_Episodes::find($id);
		$val = Model_Episodes::validate('edit');
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('episodes');
        }
		if ($val->run())
		{
			$rush->title = Input::post('title');
			$rush->youtube = Input::post('youtube');
			$rush->user_id = Input::post('user_id');

			if ($rush->save())
			{
				Session::set_flash('success', e('Updated news #' . $id));

				Response::redirect('rush');
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
				$rush->youtube = $val->validated('youtube');
				$rush->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('rush', $rush, false);
		}

		$this->template->title = "Edit Episodes";
		$this->template->content = View::forge('episodes/edit');

	}

	public function action_delete($id = null)
	{
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('episodes');
        }
		if ($rush = Model_Episodes::find($id))
		{
			$rush->delete();

			Session::set_flash('success', e('Deleted episode #'.$id));
		}
		else
		{
			Session::set_flash('error', e('Could not delete episode #'.$id));
		}

		Response::redirect('episodes');

	}


}