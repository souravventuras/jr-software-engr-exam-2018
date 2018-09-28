<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeveloperProgrammingLanguagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeveloperProgrammingLanguagesTable Test Case
 */
class DeveloperProgrammingLanguagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeveloperProgrammingLanguagesTable
     */
    public $DeveloperProgrammingLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.developer_programming_languages',
        'app.developers',
        'app.programming_languages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DeveloperProgrammingLanguages') ? [] : ['className' => DeveloperProgrammingLanguagesTable::class];
        $this->DeveloperProgrammingLanguages = TableRegistry::getTableLocator()->get('DeveloperProgrammingLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeveloperProgrammingLanguages);

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
