<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: request.proto

namespace GPBMetadata;

class Request
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\User::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0a6c0a0d726571756573742e70726f746f120e4d794170702e4d65737361" .
            "6765731a0a757365722e70726f746f22370a075265717565737412240a04" .
            "7573657218012001280b32142e4d794170702e4d657373616765732e5573" .
            "6572480042060a0464617461620670726f746f33"
        ));

        static::$is_initialized = true;
    }
}

