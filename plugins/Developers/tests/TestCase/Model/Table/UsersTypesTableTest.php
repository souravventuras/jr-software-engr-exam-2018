<?php
namespace Leaping\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Leaping\Model\Table\UsersTypesTable;

/**
 * Leaping\Model\Table\UsersTypesTable Test Case
 */
class UsersTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Leaping\Model\Table\UsersTypesTable
     */
    public $UsersTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.leaping.users_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersTypes') ? [] : ['className' => UsersTypesTable::class];
        $this->UsersTypes = TableRegistry::get('UsersTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
