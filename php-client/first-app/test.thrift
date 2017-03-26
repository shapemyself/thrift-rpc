namespace go rpc
namespace php rpc

service RpcService {
    string SayHi(1: string name);
    void SayHello(1: string name);
}