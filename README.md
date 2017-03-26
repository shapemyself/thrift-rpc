# thrift-rpc
learn how to set up rpc service by thrift between different language


### thrift生成代码
+ `thrift -r --gen php test.thrift` #生成的是客户端的代码

+ <code>thrift -r --gen php:server test.thrift</code> #生成PHP服务端接口代码有所不一样

而对于golang而言
+ `thrift -r --gen go *.thrift` 和  `thrift -r --gen go:server *.thrift` 生成的代码没有区别 
