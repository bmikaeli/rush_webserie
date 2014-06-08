<?php
class Controller_Chat extends Controller_Base
{
    public function action_index($id = null)
    {
        if(input::post() and input::post('message') != '')
        {
            $new = Model_Chat::forge(array(
                'message' => input::post('message'),
                'sender' => input::post('sender'),
            ));
            $new->save();
        }
        if(input::post('sender'))
            $data['login'] = input::post('sender');
        $data['messages'] = Model_Chat::find('all',
            array('order_by' =>
                 array(
                    'id' => 'desc'
                 ),
            'limit' => 10)
        );
        $this->template->title = "Chatbox";
        $this->template->content = View::forge('chat/index', $data);
    }
}