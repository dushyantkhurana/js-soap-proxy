# JavaScript SOAP Proxy #

JS SOAP Proxy is simple but smart HTTP SOAP webservice client. JS SOAP Proxy is written in JavaScript and intended to use in web pages.

## Browser support ##

Current version is tested with following browsers:
  * Microsoft Internet Explorer 6 (appVersion: 4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727; FDM; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729))
  * Microsoft Internet Explorer 8 (appVersion: 4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET4.0C; .NET4.0E))
  * Mozilla Firefox 3.6 (appVersion: 5.0 (Windows; ru))
  * Google Chrome (appVersion: 5.0 (Windows NT 5.1) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.83 Safari/535.11)
  * Opera 11 (appVersion: 9.80 (Windows NT 5.1; U; ru))
## Usage ##

In javascript block on web page:

### Asynchronous mode, errors checked ###
```
        ...
        // Assume service defined method SayHello() returning string "Hello, world!"
        function resultcallback(res, xml, text, proxy) {
            alert(res);
        }
        function failurecallback(res, xml, text, proxy) {
            alert("SayHello() failed");
        }
        function gotproxycallback(proxy, wsdl, text) {
            if (proxy instanceof SOAPProxy) {
                proxy.SayHello(null, true, resultcallback, failurecallback);
            } else {
                alert("Proxy not created!");
            }
        }
        $(document).ready(function () {
            try {
                SOAPProxyFabric.fromUrl("http://myhost.org/webservices/MyService.wsdl", true, gotproxycallback);
            } catch (x) {
                alert("Failed to load or parse WSDL!");
            }
        });
        ...
```

or

### Synchronous mode, no error check ###
```
        ...
        // Assume service defined method SayHello() returning string "Hello, world!"
        alert(SOAPProxyFabric.fromUrl("http://myhost.org/MyService.wsdl", false).SayHello(null, false));
        ...
```

## Samples ##

Live demo pages located at http://demiurg.orgfree.com/js-soap-proxy-samples/

See also [JSON Simple Services](http://code.google.com/p/jsonss) - another webservice framework with JavaScript support.