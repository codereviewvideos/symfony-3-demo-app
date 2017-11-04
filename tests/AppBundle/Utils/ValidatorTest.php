<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\AppBundle\Utils;

use AppBundle\Utils\Validator;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $object;

    public function __construct()
    {
        parent::__construct();

        $this->object = new Validator();
    }

    public function testValidateUsername()
    {
        $test = 'username';

        $this->assertSame($test, $this->object->validateUsername($test));
    }

    public function testValidateUsernameEmpty()
    {
        $this->setExpectedException('Exception', 'The username can not be empty.');
        $this->object->validateUsername(null);
    }

    public function testValidateUsernameInvalid()
    {
        $this->setExpectedException('Exception', 'The username must contain only lowercase latin characters and underscores.');
        $this->object->validateUsername('INVALID');
    }

    public function testValidatePassword()
    {
        $test = 'password';

        $this->assertSame($test, $this->object->validatePassword($test));
    }

    public function testValidatePasswordEmpty()
    {
        $this->setExpectedException('Exception', 'The password can not be empty.');
        $this->object->validatePassword(null);
    }

    public function testValidatePasswordInvalid()
    {
        $this->setExpectedException('Exception', 'The password must be at least 6 characters long.');
        $this->object->validatePassword('12345');
    }

    public function testValidateEmail()
    {
        $test = '@';

        $this->assertSame($test, $this->object->validateEmail($test));
    }

    public function testValidateEmailEmpty()
    {
        $this->setExpectedException('Exception', 'The email can not be empty.');
        $this->object->validateEmail(null);
    }

    public function testValidateEmailInvalid()
    {
        $this->setExpectedException('Exception', 'The email should look like a real email.');
        $this->object->validateEmail('invalid');
    }

    public function testValidateFullName()
    {
        $test = 'Full Name';

        $this->assertSame($test, $this->object->validateFullName($test));
    }

    public function testValidateEmailFullName()
    {
        $this->setExpectedException('Exception', 'The full name can not be empty.');
        $this->object->validateFullName(null);
    }
}
