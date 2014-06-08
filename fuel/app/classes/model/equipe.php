<?php
class Model_Equipe extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'prenom',
        'nom',
        'age',
        'facebook',
        'biographie',
        'picture',
        'created_at',
        'updated_at',
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('nom', 'Nom', 'required|max_length[255]');
        $val->add_field('prenom', 'Prenom', 'required|max_length[255]');
        return $val;
    }

}
