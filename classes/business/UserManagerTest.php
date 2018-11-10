<?php
//require_once 'classes/business/UserManager.php';
require_once '../../public/includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\util\DBUtil;

/**
 * UserManager test case.
 */
class UserManagerTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var UserManager
     */
    private $userManager;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        // TODO Auto-generated UserManagerTest::setUp()

        $this->userManager = new UserManager(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated UserManagerTest::tearDown()
        $this->userManager = null;

        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests UserManager::getAllUsers()
     */
    public function testGetAllUsers()
    {
        // TODO Auto-generated UserManagerTest::testGetAllUsers()
        $this->markTestIncomplete("getAllUsers test not implemented");

        UserManager::getAllUsers(/* parameters */);
    }

    /**
     * Tests UserManager::searchByOption()
     */
    public function testSearchByOption()
    {
        // TODO Auto-generated UserManagerTest::testSearchByOption()
        $this->markTestIncomplete("searchByOption test not implemented");

        UserManager::searchByOption(/* parameters */);
    }

    /**
     * Tests UserManager->getUserByEmailPassword()
     */
    public function testGetUserByValidEmailPassword()
    {
        // TODO Auto-generated UserManagerTest->testGetUserByEmailPassword()
        $this->markTestIncomplete("getUserByEmailPassword test not implemented");

        $user = $this->userManager->getUserByEmailPassword("wong@hotmail.com","Password01");
        //$this->assertInstanceOf("classes\entity\user", $user);
        $this->assertEquals('John',$user->firstName);
    }

    /**
     * Tests UserManager->getUserByEmail()
     */
    public function testGetUserByEmail()
    {
        // TODO Auto-generated UserManagerTest->testGetUserByEmail()
        $this->markTestIncomplete("getUserByEmail test not implemented");

        $this->userManager->getUserByEmail(/* parameters */);
    }

    /**
     * Tests UserManager->getUserById()
     */
    public function testGetUserById()
    {
        // TODO Auto-generated UserManagerTest->testGetUserById()
        $this->markTestIncomplete("getUserById test not implemented");

        $this->userManager->getUserById(/* parameters */);
    }

    /**
     * Tests UserManager->saveUser()
     */
    public function testSaveUser()
    {
        // TODO Auto-generated UserManagerTest->testSaveUser()
        $this->markTestIncomplete("saveUser test not implemented");

        $this->userManager->saveUser(/* parameters */);
    }

    /**
     * Tests UserManager->updatePassword()
     */
    public function testUpdatePassword()
    {
        // TODO Auto-generated UserManagerTest->testUpdatePassword()
        $this->markTestIncomplete("updatePassword test not implemented");

        $this->userManager->updatePassword(/* parameters */);
    }

    /**
     * Tests UserManager->deleteAccount()
     */
    public function testDeleteAccount()
    {
        // TODO Auto-generated UserManagerTest->testDeleteAccount()
        $this->markTestIncomplete("deleteAccount test not implemented");

        $this->userManager->deleteAccount(/* parameters */);
    }

    /**
     * Tests UserManager->randomPassword()
     */
    public function testRandomPassword()
    {
        // TODO Auto-generated UserManagerTest->testRandomPassword()
        $this->markTestIncomplete("randomPassword test not implemented");

        $this->userManager->randomPassword(/* parameters */);
    }
}

