<?php

namespace MyApp\Tests;

use PHPUnit\Framework\TestCase;
use React\EventLoop;
use React\Socket;
use React\Stream;
use MyApp\Messages;

class ClientTest extends TestCase
{
    public function testCreateUser()
    {
        $loop = EventLoop\Factory::create();
        $connector = new Socket\Connector($loop);

        $user = new Messages\User();
        $user->setName('Christopher Mancini');
        $user->setEmail('chris@domain.com');

        $request = new Messages\Request();
        $request->setUser($user);

        $response = new Messages\Response();

        $connector->connect('127.0.0.1:8008')->then(function (Socket\ConnectionInterface $conn) use ($loop, $request, $response) {
            $conn->write($request->encode());
            $conn->on('data', function ($data) use ($response) {
                $response->decode($data);
            });
        });

        $loop->run();

        $this->assertEquals($response->getData()->getFieldName(), 'user');

        $returnedUser = $response->getData()->getValue();
        $this->assertInstanceOf(Messages\User::class, $returnedUser);
        $this->assertEquals($user->getName(), $returnedUser->getName());
        $this->assertGreaterThan(0, $returnedUser->getId());
    }

    public function testFetchUser()
    {
        $loop = EventLoop\Factory::create();
        $connector = new Socket\Connector($loop);

        $user = new Messages\User();
        $user->setId(1);

        $request = new Messages\Request();
        $request->setUser($user);

        $response = new Messages\Response();

        $connector->connect('127.0.0.1:8008')->then(function (Socket\ConnectionInterface $conn) use ($loop, $request, $response) {
            $conn->write($request->encode());
            $conn->on('data', function ($data) use ($response) {
                $response->decode($data);
            });
        });

        $loop->run();

        $this->assertEquals($response->getData()->getFieldName(), 'user');

        $user = $response->getData()->getValue();
        $this->assertInstanceOf(Messages\User::class, $user);
        $this->assertEquals($user->getName(), 'Christopher Mancini');
        $this->assertEquals($user->getEmail(), 'chris@domain.com');
    }

    public function testUpdateUser()
    {
        $loop = EventLoop\Factory::create();
        $connector = new Socket\Connector($loop);

        $user = new Messages\User();
        $user->setId(1);
        $user->setName('Christopher Mancini');
        $user->setEmail('chris@newdomain.com');

        $request = new Messages\Request();
        $request->setUser($user);

        $response = new Messages\Response();

        $connector->connect('127.0.0.1:8008')->then(function (Socket\ConnectionInterface $conn) use ($loop, $request, $response) {
            $conn->write($request->encode());
            $conn->on('data', function ($data) use ($response) {
                $response->decode($data);
            });
        });

        $loop->run();

        $this->assertEquals($response->getData()->getFieldName(), 'user');

        $returnedUser = $response->getData()->getValue();
        $this->assertInstanceOf(Messages\User::class, $returnedUser);
        $this->assertEquals($user->getName(), $returnedUser->getName());
        $this->assertEquals($user->getEmail(), $returnedUser->getEmail());
        $this->assertGreaterThan(0, $returnedUser->getId());
    }

    public function testUserNotFound()
    {
        $loop = EventLoop\Factory::create();
        $connector = new Socket\Connector($loop);

        $user = new Messages\User();
        $user->setId(120);

        $request = new Messages\Request();
        $request->setUser($user);

        $response = new Messages\Response();

        $connector->connect('127.0.0.1:8008')->then(function (Socket\ConnectionInterface $conn) use ($loop, $request, $response) {
            $conn->write($request->encode());
            $conn->on('data', function ($data) use ($response) {
                $response->decode($data);
            });
        });

        $loop->run();

        $this->assertEquals($response->getData()->getFieldName(), 'error');

        $error = $response->getData()->getValue();
        $this->assertInstanceOf(Messages\Response_Error::class, $error);
        $this->assertEquals($error->getCode(), '404');
    }
}
