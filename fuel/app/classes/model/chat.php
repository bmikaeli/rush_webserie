<?php
class Model_Chat extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'message',
        'sender',
    );

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        return $val;
    }

}
