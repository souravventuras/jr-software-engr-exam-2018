<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeveloperLanguagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeveloperLanguagesTable Test Case
 */
class DeveloperLanguagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeveloperLanguagesTable
     */
    public $DeveloperLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.developer_languages',
        'app.developers',
        'app.languages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DeveloperLanguages') ? [] : ['className' => DeveloperLanguagesTable::class];
        $this->DeveloperLanguages = TableRegistry::getTableLocator()->get('DeveloperLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeveloperLanguages);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
