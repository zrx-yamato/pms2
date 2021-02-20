<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstimatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstimatesTable Test Case
 */
class EstimatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstimatesTable
     */
    public $Estimates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estimates',
        'app.projects',
        'app.add_users',
        'app.update_users',
        'app.statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Estimates') ? [] : ['className' => EstimatesTable::class];
        $this->Estimates = TableRegistry::get('Estimates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estimates);

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
