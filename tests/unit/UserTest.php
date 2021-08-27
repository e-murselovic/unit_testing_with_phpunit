<?php

class UserTest extends \PHPUnit\Framework\TestCase 
{
    protected $user;

    /**
     * Called each time before every test function/method
     */
    public function setUp():void
    {
        $this->user = new \App\Models\User;
    }

    /** @test */
    public function that_we_can_get_the_first_name()
    {
        $this->user->setFirstName('Edin');

        $this->assertEquals($this->user->getFirstName(), 'Edin');
    }

    public function testThatWeCanGetLastName()
    {
        $user = new \App\Models\User;

        $user->setLastName('Murselovic');

        $this->assertEquals($user->getLastName(), 'Murselovic');
    }

    public function testFullNameIsReturned()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Edin');
        $user->setLastName('Murselovic');

        $this->assertEquals($user->getFullName(), "Edin Murselovic");
    }

    public function testFirstAndLastNamesAreTrimmed()
    {
        $user = new \App\Models\User;

        $user->setFirstName(' Edin       ');
        $user->setLastName('    Murselovic');

        $this->assertEquals($user->getFirstName(), "Edin");
        $this->assertEquals($user->getLastName(), "Murselovic");
    }

    public function testEmailAddressCanBeSet()
    {
        $user = new \App\Models\User;

        $user->setEmail('edin@test.com');

        $this->assertEquals($user->getEmail(), "edin@test.com");
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new \App\Models\User;
        $user->setFirstName(' Edin       ');
        $user->setLastName('    Murselovic');
        $user->setEmail('edin@test.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], "Edin Murselovic");
        $this->assertEquals($emailVariables['email'], "edin@test.com");
    }
}