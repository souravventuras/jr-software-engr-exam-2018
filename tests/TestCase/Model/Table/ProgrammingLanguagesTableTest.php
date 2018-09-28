<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgrammingLanguagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgrammingLanguagesTable Test Case
 */
class ProgrammingLanguagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgrammingLanguagesTable
     */
    public $ProgrammingLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.programming_languages',
        'app.developer_programming_languages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProgrammingLanguages') ? [] : ['className' => ProgrammingLanguagesTable::class];
        $this->ProgrammingLanguages = TableRegistry::getTableLocator()->get('ProgrammingLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProgrammingLanguages);

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
