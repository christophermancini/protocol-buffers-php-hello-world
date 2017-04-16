<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: user.proto

namespace MyApp\Messages;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>MyApp.Messages.User</code>
 */
class User extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * <code>int32 id = 2;</code>
     */
    private $id = 0;
    /**
     * <code>string email = 3;</code>
     */
    private $email = '';

    public function __construct() {
        \GPBMetadata\User::initOnce();
        parent::__construct();
    }

    /**
     * <code>string name = 1;</code>
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * <code>string name = 1;</code>
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;
    }

    /**
     * <code>int32 id = 2;</code>
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * <code>int32 id = 2;</code>
     */
    public function setId($var)
    {
        GPBUtil::checkInt32($var);
        $this->id = $var;
    }

    /**
     * <code>string email = 3;</code>
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * <code>string email = 3;</code>
     */
    public function setEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->email = $var;
    }

}

