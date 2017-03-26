<?php
/**
 * Created by PhpStorm.
 * User: liuhengsheng
 * Date: 2017/3/26
 * Time: 下午9:12
 */

error_reporting(E_ALL);

require_once __DIR__ . '/Thrift/ClassLoader/ThriftClassLoader.php';
require_once __DIR__ . '/rpc/RpcService.php';
require_once __DIR__ . '/rpc/Types.php';



use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;


//load thrift class
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', __DIR__ . '/');
$loader->registerDefinition('rpc', __DIR__.'/rpc');
$loader->register();

//Init rpc client
$socket = new TSocket('localhost', 8890);
$transport = new TBufferedTransport($socket, 1024, 1024);
$protocol = new TBinaryProtocol($transport);
$client = new \rpc\RpcServiceClient($protocol);

//config
$socket->setSendTimeout(30*1000);
$socket->setRecvTimeout(30*1000);

//connect
$transport->open();

//call rpc interface
$client->SayHi('我是一个男的');


//close connect
$transport->close();