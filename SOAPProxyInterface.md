# Introduction #

JavaScript SOAP Proxy library defines singleton object **SOAPProxyFabric** which is used to build webservice **proxies** of type **SOAPProxy**. Those proxies then automagically extended by adding webservices's methods and returned to user script.

User script accesses webservice via **SOAPProxy** extension methods or directly via **invoke()** interface.

Also, there is **SOAPProxyUtils** object used internally by JavaScript SOAP Proxy.

## SOAPProxyFabric ##

### property 'version' ###
`SOAPProxyFabric.version`

contains library version string. E.g. "1.0"

### method 'fromUrl' ###
`SOAPProxyFabric.fromUrl(source, async, callback)`

where:

**source** is URL pointing to webservices's WSDL, or just string containing WSDL text.

**async** is boolean indicating asynchronous (true) or synchronous mode of WSDL loading

**callback** is function(proxyObject, WSDLDOM, WSDLText) called at the end of WSDL parsing process.

proxyObject is SOAPProxy built, WSDLDOM is XML DOM object, representing WSDL, WSDLText is original text of WSDL. In case of failure, proxyObject is browser's object Error. If async == false, SOAPProxyFabric.fromUrl passes SOAPProxy built as return value.

### method 'fromDOM' ###
`SOAPProxyFabric.fromDOM(XMLDOMObject)`
where XMLDOMObject is XML DOM object, representing WSDL

SOAPProxyFabric.fromUrl parses WSDL from XML DOM and returns SOAPProxy built from that.

### method 'fromXml' ###
`SOAPProxyFabric.fromXml(XMLText)`

where XMLText is text of WSDL

SOAPProxyFabric.fromUrl parses WSDL text and returns SOAPProxy built from that.

## SOAPProxy ##

### property serviceUrl ###

Contains URL of webservice itself. E.g. http://myhost.org/services/MyService.asmx

### property lastRequest ###

Contains text (XML) of last SOAP request. When request building fails? this property is left intact, thus containing text of previous SOAP request.

### property lastRequestHeaders ###

Contains HTTP headers, been prepended to last SOAP request.

### last statusCode ###

Contains statusCode for last XmlHttp operation used to send request.

### property lastResponse ###

Contains text of last webservice response.

### property lastResponseHeaders ###

Contains HTTP headers? received with last webservice response.

### method invoke ###
```
SOAPProxy.prototype.invoke(method, params, async, resultcallback, faultcallback)
```

where:

**method** (string) name of webservice method

**params** (object) contains properties whose names correspond to webservice method parameters defined in inbound message

**async** (boolean) indicating asynchronous (true) or synchronous request processing

**resultcallback** function (result, DOM, XML, proxy) receiving notification on successful completion of reqest. result is websrvice method's return value, DOM is XML DOM containing response, XML is response text, and proxy is SOAPProxy instance

**resultcallback** function (result, DOM, XML, proxy) receiving notification on failed reqest. result is websrvice method's return value, DOM is XML DOM containing response, XML is response text, and proxy is SOAPProxy instance