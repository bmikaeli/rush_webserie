<?php
class Controller_Equipe extends Controller_Base{

    public function action_index($id = null)
    {
        $data['rushes'] = Model_Equipe::find('all');
        $this->template->title = "Les Membre de l'equipe";
        $this->template->content = View::forge('equipe/index', $data);

    }
    public function action_create()
    {
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('equipe');
        }
        if (Input::method() == 'POST')
        {
            $val = Model_Equipe::validate('create');

            if ($val->run())
            {
                $rush = Model_Equipe::forge(array(
                    'nom' => Input::post('nom'),
                    'prenom' => Input::post('prenom'),
                    'age' => Input::post('age'),
                    'biographie' => Input::post('biographie'),
                    'facebook' => Input::post('facebook'),
                    'picture' => isset ($_FILES['filename']['name']) ? input::post('prenom') : 'rien',
                ));
                if ( $_FILES['filename']['name'])
                {
                    if(file_exists("assets/img/equipe/".input::post('prenom').".jpg"))
                        unlink("assets/img/equipe/".input::post('prenom').".jpg");
                    $config = array(
                        'extension' => 'jpg',
                        'new_name' => Input::post('prenom'),
                        'path' => 'assets/img/equipe/',
                        'ext_whitelist' => array('img', 'jpg', 'png', 'gif', 'jpeg'),
                    );

                    Upload::process($config);

                    if(Upload::is_Valid())
                    {
                        Upload::save();
                    }
                    else
                    {
                        Session::set_flash('error', e('Could not save member.'));
                        Response::redirect('equipe');

                    }
                }

                if ($rush and $rush->save())
                {
                    Session::set_flash('success', e('Added membre dequipe #'.$rush->id.'.'));

                    Response::redirect('equipe');
                }

                else
                {
                    Session::set_flash('error', e('Could not save new member.'));
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Rushes";
        $this->template->content = View::forge('equipe/create');

    }

    public function action_photodel($id = null)
    {
        $user = Model_Equipe::find($id);
        $name = $user->prenom;
        if ( file_exists("assets/img/equipe/".$name.".jpg"))
        {
            unlink("assets/img/equipe/".$name.".jpg");
            Session::set_flash('success', e('La photo a bien ete supprimer'));
        }
        else
            Session::set_flash('error', e('Something went wrong'));
        Response::redirect('equipe');

    }

    public function action_edit($id = null)
    {
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('equipe');
        }

        $rush = Model_Equipe::find($id);
        $val = Model_Equipe::validate('edit');

        if ($val->run())
        {
            $rush->nom = Input::post('nom');
            $rush->prenom = Input::post('prenom');
            $rush->age = Input::post('age');
            $rush->biographie = Input::post('biographie');
            $rush->facebook = Input::post('facebook');

            if ( $_FILES['filename']['name'] && strlen($_FILES['filename']['name']) != 0)
            {
                if(file_exists("assets/img/equipe/".input::post('prenom').".jpg"))
                    unlink("assets/img/equipe/".input::post('prenom').".jpg");
                $config = array(
                    'extension' => 'jpg',
                    'new_name' => Input::post('prenom'),
                    'path' => 'assets/img/equipe/',
                    'ext_whitelist' => array('img', 'jpg', 'png', 'gif', 'jpeg'),
                );

                Upload::process($config);

                if(Upload::is_Valid())
                {
                    Upload::save();
                }
                else
                {
                    Session::set_flash('error', e('Could not save member.'));
                    Response::redirect('equipe');

                }
            }
            if ($rush->save())
            {
                Session::set_flash('success', e('Updated member #' . $id));

                Response::redirect('equipe');
            }

            else
            {
                Session::set_flash('error', e('Could not update member #' . $id));
            }
        }

        else
        {
            if (Input::method() == 'POST')
            {
                $rush->nom = Input::post('nom');
                $rush->prenom = Input::post('prenom');
                $rush->age = Input::post('age');
                $rush->biographie = Input::post('biographie');
                $rush->facebook = Input::post('facebook');
                $rush->picture = Input::post('picture');


                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('rush', $rush, false);
        }

        $this->template->title = "Edit membre de lequipe";
        $this->template->content = View::forge('equipe/edit');

    }

    public function action_delete($id = null)
    {
        if(! $this->current_user)
        {
            Session::set_flash('error', e('You can\'t do that, you are note an admin'));
            Response::redirect('equipe');
        }

        if ($rush = Model_Equipe::find($id))
        {
            $rush->delete();

            Session::set_flash('success', e('Deleted member #'.$id));
        }

        else
        {
            Session::set_flash('error', e('Could not delete member #'.$id));
        }

        Response::redirect('equipe');

    }

    public function action_view($id = null)
    {
        $data['rush'] = Model_Equipe::find_by_prenom($id);
        $this->template->title = "Profil";
        $this->template->content = View::forge('equipe/view', $data);

    }

}