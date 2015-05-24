<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActivitiesFixture
 *
 */
class ActivitiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idactivity' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'activity_local' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'activity_hours' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'semester' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'abstract' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'path' => ['type' => 'string', 'length' => 90, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'users_iduser' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'classification_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'avaliation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_activities_users1_idx' => ['type' => 'index', 'columns' => ['users_iduser'], 'length' => []],
            'fk_activities_classifications1_idx' => ['type' => 'index', 'columns' => ['classification_id'], 'length' => []],
            'fk_activities_avaliations1_idx' => ['type' => 'index', 'columns' => ['avaliation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idactivity'], 'length' => []],
            'fk_activities_avaliations1' => ['type' => 'foreign', 'columns' => ['avaliation_id'], 'references' => ['avaliations', 'idavalation'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_activities_classifications1' => ['type' => 'foreign', 'columns' => ['classification_id'], 'references' => ['classifications', 'idclassification'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_activities_users1' => ['type' => 'foreign', 'columns' => ['users_iduser'], 'references' => ['users', 'iduser'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'idactivity' => 1,
            'activity_local' => 'Lorem ipsum dolor sit amet',
            'activity_hours' => 'Lorem ip',
            'semester' => 'Lorem ipsum dolor sit amet',
            'abstract' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'date' => '2015-04-25',
            'path' => 'Lorem ipsum dolor sit amet',
            'users_iduser' => 1,
            'classification_id' => 1,
            'avaliation_id' => 1
        ],
    ];
}
