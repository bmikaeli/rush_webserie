<?php
class Controller_Contact extends Controller_Base{

    public function action_index()
    {
        if(input::post())
        {
            $nom= $_POST['nom'];
            $prenom= $_POST['prenom'];
            $subject = 'Rush website  '.$nom."  ".$prenom;
            $message = $_POST['message'];
            $message = wordwrap($message, 70);
//            $to = 'baptiste.mikaelian@gmail.com;joe.lefou@facebook.com;alexis.dacosta.3344@facebook.com';
//            mail($to, $subject, $message);
            $to = 'baptiste.mikaelian@gmail.com';
            mail($to, $subject, $message);

            if (mail($to, $subject, $message))
            {
                Session::set_flash('success', e('Votre message a bien été envoyer ! Nous vous recontacterons prochainement'));
                Response::redirect('contact');
            }
            else
            {
                Session::set_flash('error', e('Votre message n\'a pas put être envoyer, veuillez reessayer'));
                Response::redirect('contact');
            }
        }
        $this->template->title = "Contactez nous";
        $this->template->content = View::forge('contact');
    }
}