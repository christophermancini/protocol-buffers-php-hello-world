[![CircleCI](https://circleci.com/gh/christophermancini/protocol-buffers-php-hello-world.svg?style=svg)](https://circleci.com/gh/christophermancini/protocol-buffers-php-hello-world)

# Protocol Buffers Hello World

This simple application is designed to demonstrate using Protocol Buffers to serialize data and transfer over a socket to another system. It consists of a server process that listens for requests to create, update or fetch a user data structure. The phpunit tests contain client code that connects to the server and attempts to save a new user, fetch a user, and update a user.
