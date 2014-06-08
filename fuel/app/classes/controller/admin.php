<?php

class Controller_Admin extends Controller_Base
{
	public $template = 'template';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout', 'equipe', 'news')))
		{
			if (Auth::check())
			{
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($admin_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
                    Response::redirect('/');
				}
			}
			else
			{
//				Response::redirect('admin/login');
			}
		}
	}
    public function action_background()
    {
        $this->before();
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('news');
        }
        if (input::post())
        {
            if ( $_FILES['filename']['name'])
            {
                $config = array(
                    'extension' => 'jpg',
                    'new_name' => 'background',
                    'path' => 'assets/img/background/',
                    'ext_whitelist' => array('img', 'jpg', 'png', 'gif', 'jpeg'),
                );
            }
            if(file_exists('assets/img/background/background.jpg'))
                unlink('assets/img/background/background.jpg');
            Upload::process($config);
            if(Upload::is_Valid())
            {
                Upload::save();
            }
            else
            {
                Session::set_flash('error', e('Could not save background.'));
                Response::redirect('admin/background');
            }
            Session::set_flash('success', e('background changes successfully'));
        }

        $this->template->title = 'Changer l\'image de fond';
        $this->template->content = View::forge('admin/background');
    }

	public function action_login()
	{
		Auth::check() and Response::redirect('admin');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{
				$auth = Auth::instance();

				if (Auth::check() or $auth->login(Input::post('email'), Input::post('password')))
				{
					if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
					{
						$current_user = Model\Auth_User::find_by_username(Auth::get_screen_name());
					}
					else
					{
						$current_user = Model_User::find_by_username(Auth::get_screen_name());
					}
					Session::set_flash('success', e('Welcome, '.$current_user->username));
					Response::redirect('');
				}
				else
				{
					$this->template->set_global('login_error', 'Fail');
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('login', array('val' => $val), false);
	}

	/**
	 * The logout action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('/');
	}

	/**
	 * The index action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{
		$this->template->title = 'Admin';
		$this->template->content = View::forge('admin/index');
	}

}

/* End of file admin.php */
