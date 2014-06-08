<?php
class Controller_Autres extends Controller_Base{

    public function action_index($id = null)
    {
        $this->template->title = "Decouvrez aussi nos autres production";
        $this->template->content = View::forge('other');

    }
}