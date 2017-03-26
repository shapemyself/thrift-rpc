package main

import (
	"rpc"
	"fmt"
	"git.apache.org/thrift.git/lib/go/thrift"
)

type myService struct {

}

func (this *myService) SayHi(name string)(r string, err error) {
	fmt.Println("Hi ", name)
	r = "Hello " + name
	err =nil
	return
}

func (this *myService) SayHello(name string) error{
	fmt.Println("Hello ",  name)
	return  nil
}

func main() {
	serverTransport,err := thrift.NewTServerSocket("127.0.0.1:8890")
	if err != nil {
		fmt.Println("server error:", err)
		return
	}

	handler := &myService{}
	processor := rpc.NewRpcServiceProcessor(handler)
	server := thrift.NewTSimpleServer2(processor, serverTransport)
	fmt.Println("thrift server in localhost")

	server.Serve()
}



