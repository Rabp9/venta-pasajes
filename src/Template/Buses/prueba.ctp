<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Error: Missing Method in UbicacionesController    </title>
    <link href="/SANESACTT-backend/favicon.ico" type="image/x-icon" rel="icon"/><link href="/SANESACTT-backend/favicon.ico" type="image/x-icon" rel="shortcut icon"/>    <style>
    body {
        font: 14px helvetica, arial, sans-serif;
        color: #222;
        background-color: #f8f8f8;
        padding:0;
        margin: 0;
        max-height: 100%;
    }

    .code-dump,
    pre {
        background: #fefefe;
        border: 1px solid #ddd;
        padding: 5px;
        white-space: pre-wrap;
    }

    header {
        background-color: #C3232D;
        color: #ffffff;
        padding: 16px 10px;
        border-bottom: 3px solid #626262;
    }
    .header-title {
        margin: 0;
        font-weight: normal;
        font-size: 30px;
        line-height: 64px;
    }
    .header-type {
        opacity: 0.75;
        display: block;
        font-size: 16px;
        line-height: 1;
    }
    .header-help {
        font-size: 12px;
        line-height: 1;
        position: absolute;
        top: 30px;
        right: 16px;
    }
    .header-help a {
        color: #fff;
    }

    .error-nav {
        float: left;
        width: 30%;
    }
    .error-contents {
        padding: 10px 1%;
        float: right;
        width: 68%;
    }

    .error,
    .error-subheading {
        font-size: 18px;
        margin-top: 0;
        padding: 10px;
        border: 1px solid #EDBD26;
    }
    .error-subheading {
        background: #1798A5;
        color: #fff;
        border: 1px solid #02808C;
    }
    .error {
        background: #ffd54f;
    }
    .customize {
        opacity: 0.6;
    }

    .stack-trace {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .stack-frame {
        padding: 10px;
        border-bottom: 1px solid #212121;
    }
    .stack-frame:last-child {
        border-bottom: none;
    }
    .stack-frame a {
        display: block;
        color: #212121;
        text-decoration: none;
    }
    .stack-frame.active {
        background: #e5e5e5;
    }
    .stack-frame a:hover {
        text-decoration: underline;
    }
    .stack-file,
    .stack-function {
        display: block;
        margin-bottom: 5px;
    }

    .stack-frame-file,
    .stack-file {
        font-family: consolas, monospace;
    }
    .stack-function {
        font-weight: bold;
    }
    .stack-file {
        font-size: 0.9em;
        word-wrap: break-word;
    }

    .stack-details {
        background: #ececec;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        border: 1px solid #ababab;
        padding: 10px;
        margin-bottom: 18px;
    }
    .stack-frame-args {
        float: right;
    }

    .toggle-link {
        color: #1798A5;
        text-decoration: none;
    }
    .toggle-link:hover {
        text-decoration: underline;
    }
    .toggle-vendor-frames {
        padding: 5px;
        display: block;
        text-align: center;
    }

    .code-excerpt {
        width: 100%;
        margin: 5px 0;
        background: #fefefe;
    }
    .code-highlight {
        display: block;
        background: #fff59d;
    }
    .excerpt-line {
        padding-left: 2px;
    }
    .excerpt-number {
        background: #f6f6f6;
        width: 50px;
        text-align: right;
        color: #666;
        border-right: 1px solid #ddd;
        padding: 2px;
    }
    .excerpt-number:after {
        content: attr(data-number);
    }

    table {
        text-align: left;
    }
    th, td {
        padding: 4px;
    }
    th {
        border-bottom: 1px solid #ccc;
    }
    </style>
</head>
<body>
    <header>
        <h1 class="header-title">
            Missing Method in UbicacionesController            <span class="header-type">Cake\Controller\Exception\MissingActionException</span>
        </h1>
        <div class="header-help">
            <a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a>
            <a target="_blank" href="http://api.cakephp.org/">API</a>
        </div>
    </header>

    <div class="error-contents">
                <p class="error-subheading">
            The action <em>buscarUbicaciones.json</em> is not defined in <em>UbicacionesController</em>        </p>
        
        
    <div id="stack-frame-0" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\ActionDispatcher.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-0">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="117"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$result&nbsp;</span><span style="color: #007700">instanceof&nbsp;</span><span style="color: #0000BB">Response</span><span style="color: #007700">)&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="118"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$result</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="119"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="120"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="121"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$response&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$controller</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">invokeAction</span><span style="color: #007700">();</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="122"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$response&nbsp;</span><span style="color: #007700">!==&nbsp;</span><span style="color: #0000BB">null&nbsp;</span><span style="color: #007700">&amp;&amp;&nbsp;!(</span><span style="color: #0000BB">$response&nbsp;</span><span style="color: #007700">instanceof&nbsp;</span><span style="color: #0000BB">Response</span><span style="color: #007700">))&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="123"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">throw&nbsp;new&nbsp;</span><span style="color: #0000BB">LogicException</span><span style="color: #007700">(</span><span style="color: #DD0000">'Controller&nbsp;actions&nbsp;can&nbsp;only&nbsp;return&nbsp;Cake\Network\Response&nbsp;or&nbsp;null.'</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="124"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="125"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-0" style="display: none;">
            <pre>No arguments</pre>
        </div>
    </div>
    <div id="stack-frame-1" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\ActionDispatcher.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-1">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="91"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}&nbsp;else&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="92"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$controller&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">factory</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">create</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="93"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="94"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="95"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$response&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">_invoke</span><span style="color: #007700">(</span><span style="color: #0000BB">$controller</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="96"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(isset(</span><span style="color: #0000BB">$request</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">params</span><span style="color: #007700">[</span><span style="color: #DD0000">'return'</span><span style="color: #007700">]))&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="97"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="98"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="99"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-1" style="display: none;">
            <pre>object(App\Controller\UbicacionesController) {
	name =&gt; &#039;Ubicaciones&#039;
	helpers =&gt; []
	request =&gt; object(Cake\Network\Request) {
		params =&gt; [
			[maximum depth reached]
		]
		data =&gt; [[maximum depth reached]]
		query =&gt; [[maximum depth reached]]
		cookies =&gt; [[maximum depth reached]]
		url =&gt; &#039;ubicaciones/buscarUbicaciones.json&#039;
		base =&gt; &#039;/SANESACTT-backend&#039;
		webroot =&gt; &#039;/SANESACTT-backend/&#039;
		here =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;
		trustProxy =&gt; false
		[protected] _environment =&gt; [
			[maximum depth reached]
		]
		[protected] _detectors =&gt; [
			[maximum depth reached]
		]
		[protected] _detectorCache =&gt; [
			[maximum depth reached]
		]
		[protected] _input =&gt; &#039;&#039;
		[protected] _session =&gt; object(Cake\Network\Session) {}
	}
	response =&gt; object(Cake\Network\Response) {

		&#039;status&#039; =&gt; (int) 200,
		&#039;contentType&#039; =&gt; &#039;text/html&#039;,
		&#039;headers&#039; =&gt; [[maximum depth reached]],
		&#039;file&#039; =&gt; null,
		&#039;fileRange&#039; =&gt; [[maximum depth reached]],
		&#039;cookies&#039; =&gt; [[maximum depth reached]],
		&#039;cacheDirectives&#039; =&gt; [[maximum depth reached]],
		&#039;body&#039; =&gt; &#039;&#039;
	
	}
	paginate =&gt; []
	autoRender =&gt; true
	components =&gt; []
	View =&gt; null
	plugin =&gt; null
	passedArgs =&gt; []
	modelClass =&gt; &#039;Ubicaciones&#039;
	viewClass =&gt; null
	viewVars =&gt; []
	RequestHandler =&gt; object(Cake\Controller\Component\RequestHandlerComponent) {

		&#039;components&#039; =&gt; [[maximum depth reached]],
		&#039;implementedEvents&#039; =&gt; [
			[maximum depth reached]
		],
		&#039;_config&#039; =&gt; [
			[maximum depth reached]
		]
	
	}
	Flash =&gt; object(Cake\Controller\Component\FlashComponent) {

		&#039;components&#039; =&gt; [[maximum depth reached]],
		&#039;implementedEvents&#039; =&gt; [[maximum depth reached]],
		&#039;_config&#039; =&gt; [
			[maximum depth reached]
		]
	
	}
	[protected] _responseClass =&gt; &#039;Cake\Network\Response&#039;
	[protected] _components =&gt; object(Cake\Controller\ComponentRegistry) {

		&#039;_Controller&#039; =&gt; object(App\Controller\UbicacionesController) {},
		&#039;_loaded&#039; =&gt; [
			[maximum depth reached]
		],
		&#039;_eventManager&#039; =&gt; object(Cake\Event\EventManager) {},
		&#039;_eventClass&#039; =&gt; &#039;\Cake\Event\Event&#039;
	
	}
	[protected] _validViewOptions =&gt; [
		(int) 0 =&gt; &#039;passedArgs&#039;
	]
	[protected] _eventManager =&gt; object(Cake\Event\EventManager) {

		&#039;_listeners&#039; =&gt; [
			[maximum depth reached]
		],
		&#039;_isGlobal&#039; =&gt; false,
		&#039;_eventList&#039; =&gt; null,
		&#039;_trackEvents&#039; =&gt; false,
		&#039;_generalManager&#039; =&gt; &#039;(object) EventManager&#039;
	
	}
	[protected] _eventClass =&gt; &#039;\Cake\Event\Event&#039;
	[protected] _tableLocator =&gt; object(Cake\ORM\Locator\TableLocator) {
		[protected] _config =&gt; [[maximum depth reached]]
		[protected] _instances =&gt; [[maximum depth reached]]
		[protected] _fallbacked =&gt; [[maximum depth reached]]
		[protected] _options =&gt; [[maximum depth reached]]
	}
	[protected] _modelFactories =&gt; [
		&#039;Table&#039; =&gt; [
			(int) 0 =&gt; object(Cake\ORM\Locator\TableLocator) {},
			(int) 1 =&gt; &#039;get&#039;
		]
	]
	[protected] _modelType =&gt; &#039;Table&#039;
	[protected] _viewBuilder =&gt; null
}</pre>
        </div>
    </div>
    <div id="stack-frame-2" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\BaseApplication.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-2">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="79"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cakeRequest&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">RequestTransformer</span><span style="color: #007700">::</span><span style="color: #0000BB">toCake</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="80"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cakeResponse&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">ResponseTransformer</span><span style="color: #007700">::</span><span style="color: #0000BB">toCake</span><span style="color: #007700">(</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="81"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="82"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Dispatch&nbsp;the&nbsp;request/response&nbsp;to&nbsp;CakePHP</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="83"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cakeResponse&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getDispatcher</span><span style="color: #007700">()-&gt;</span><span style="color: #0000BB">dispatch</span><span style="color: #007700">(</span><span style="color: #0000BB">$cakeRequest</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$cakeResponse</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="84"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="85"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Convert&nbsp;the&nbsp;response&nbsp;back&nbsp;into&nbsp;a&nbsp;PSR7&nbsp;object.</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="86"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">ResponseTransformer</span><span style="color: #007700">::</span><span style="color: #0000BB">toPsr</span><span style="color: #007700">(</span><span style="color: #0000BB">$cakeResponse</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="87"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-2" style="display: none;">
            <pre>object(Cake\Network\Request) {
	params =&gt; [
		&#039;controller&#039; =&gt; &#039;Ubicaciones&#039;,
		&#039;action&#039; =&gt; &#039;buscarUbicaciones.json&#039;,
		&#039;pass&#039; =&gt; [],
		&#039;plugin&#039; =&gt; null,
		&#039;_matchedRoute&#039; =&gt; &#039;/:controller/:action/*&#039;,
		&#039;_ext&#039; =&gt; null,
		&#039;isAjax&#039; =&gt; false
	]
	data =&gt; []
	query =&gt; []
	cookies =&gt; []
	url =&gt; &#039;ubicaciones/buscarUbicaciones.json&#039;
	base =&gt; &#039;/SANESACTT-backend&#039;
	webroot =&gt; &#039;/SANESACTT-backend/&#039;
	here =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;
	trustProxy =&gt; false
	[protected] _environment =&gt; [
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;HTTP_CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520,
		&#039;HTTP_X_HTTP_METHOD_OVERRIDE&#039; =&gt; null,
		&#039;ORIGINAL_REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;HTTPS&#039; =&gt; false,
		&#039;HTTP_X_REQUESTED_WITH&#039; =&gt; null,
		&#039;HTTP_IF_NONE_MATCH&#039; =&gt; null,
		&#039;HTTP_IF_MODIFIED_SINCE&#039; =&gt; null
	]
	[protected] _detectors =&gt; [
		&#039;get&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;REQUEST_METHOD&#039;,
			&#039;value&#039; =&gt; &#039;GET&#039;
		],
		&#039;post&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;REQUEST_METHOD&#039;,
			&#039;value&#039; =&gt; &#039;POST&#039;
		],
		&#039;put&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;REQUEST_METHOD&#039;,
			&#039;value&#039; =&gt; &#039;PUT&#039;
		],
		&#039;patch&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;REQUEST_METHOD&#039;,
			&#039;value&#039; =&gt; &#039;PATCH&#039;
		],
		&#039;delete&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;REQUEST_METHOD&#039;,
			&#039;value&#039; =&gt; &#039;DELETE&#039;
		],
		&#039;head&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;REQUEST_METHOD&#039;,
			&#039;value&#039; =&gt; &#039;HEAD&#039;
		],
		&#039;options&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;REQUEST_METHOD&#039;,
			&#039;value&#039; =&gt; &#039;OPTIONS&#039;
		],
		&#039;ssl&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;HTTPS&#039;,
			&#039;options&#039; =&gt; [
				[maximum depth reached]
			]
		],
		&#039;ajax&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;HTTP_X_REQUESTED_WITH&#039;,
			&#039;value&#039; =&gt; &#039;XMLHttpRequest&#039;
		],
		&#039;flash&#039; =&gt; [
			&#039;env&#039; =&gt; &#039;HTTP_USER_AGENT&#039;,
			&#039;pattern&#039; =&gt; &#039;/^(Shockwave|Adobe) Flash/&#039;
		],
		&#039;requested&#039; =&gt; [
			&#039;param&#039; =&gt; &#039;requested&#039;,
			&#039;value&#039; =&gt; (int) 1
		],
		&#039;json&#039; =&gt; [
			&#039;accept&#039; =&gt; [
				[maximum depth reached]
			],
			&#039;param&#039; =&gt; &#039;_ext&#039;,
			&#039;value&#039; =&gt; &#039;json&#039;
		],
		&#039;xml&#039; =&gt; [
			&#039;accept&#039; =&gt; [
				[maximum depth reached]
			],
			&#039;param&#039; =&gt; &#039;_ext&#039;,
			&#039;value&#039; =&gt; &#039;xml&#039;
		],
		&#039;mobile&#039; =&gt; object(Closure) {},
		&#039;tablet&#039; =&gt; object(Closure) {}
	]
	[protected] _detectorCache =&gt; [
		&#039;ajax&#039; =&gt; false,
		&#039;get&#039; =&gt; false,
		&#039;head&#039; =&gt; false,
		&#039;options&#039; =&gt; true
	]
	[protected] _input =&gt; &#039;&#039;
	[protected] _session =&gt; object(Cake\Network\Session) {
		[protected] _engine =&gt; null
		[protected] _started =&gt; null
		[protected] _lifetime =&gt; &#039;1440&#039;
		[protected] _isCLI =&gt; false
	}
}
object(Cake\Network\Response) {

	&#039;status&#039; =&gt; (int) 200,
	&#039;contentType&#039; =&gt; &#039;text/html&#039;,
	&#039;headers&#039; =&gt; [],
	&#039;file&#039; =&gt; null,
	&#039;fileRange&#039; =&gt; [],
	&#039;cookies&#039; =&gt; [],
	&#039;cacheDirectives&#039; =&gt; [],
	&#039;body&#039; =&gt; &#039;&#039;

}</pre>
        </div>
    </div>
    <div id="stack-frame-3" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\Runner.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-3">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="61"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$next&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">middleware</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">get</span><span style="color: #007700">(</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="62"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$next</span><span style="color: #007700">)&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="63"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">++;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="64"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="65"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="66"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="67"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="68"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;End&nbsp;of&nbsp;the&nbsp;queue</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="69"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-3" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {},
		&#039;params&#039; =&gt; [
			&#039;controller&#039; =&gt; &#039;Ubicaciones&#039;,
			&#039;action&#039; =&gt; &#039;buscarUbicaciones.json&#039;,
			&#039;pass&#039; =&gt; [[maximum depth reached]],
			&#039;plugin&#039; =&gt; null,
			&#039;_matchedRoute&#039; =&gt; &#039;/:controller/:action/*&#039;
		]
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}
object(Cake\Http\Runner) {
	[protected] index =&gt; (int) 4
	[protected] middleware =&gt; object(Cake\Http\MiddlewareQueue) {
		[protected] queue =&gt; [
			[maximum depth reached]
		]
		[protected] callables =&gt; [
			[maximum depth reached]
		]
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-4" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Routing\Middleware\RoutingMiddleware.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-4">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="58"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$response</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getHeaders</span><span style="color: #007700">()</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="59"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="60"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="61"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="62"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="63"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="64"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="65"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-4" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {},
		&#039;params&#039; =&gt; [
			&#039;controller&#039; =&gt; &#039;Ubicaciones&#039;,
			&#039;action&#039; =&gt; &#039;buscarUbicaciones.json&#039;,
			&#039;pass&#039; =&gt; [[maximum depth reached]],
			&#039;plugin&#039; =&gt; null,
			&#039;_matchedRoute&#039; =&gt; &#039;/:controller/:action/*&#039;
		]
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-5" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\Runner.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-5">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="61"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$next&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">middleware</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">get</span><span style="color: #007700">(</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="62"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$next</span><span style="color: #007700">)&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="63"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">++;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="64"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="65"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="66"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="67"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="68"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;End&nbsp;of&nbsp;the&nbsp;queue</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="69"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-5" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {}
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}
object(Cake\Http\Runner) {
	[protected] index =&gt; (int) 4
	[protected] middleware =&gt; object(Cake\Http\MiddlewareQueue) {
		[protected] queue =&gt; [
			[maximum depth reached]
		]
		[protected] callables =&gt; [
			[maximum depth reached]
		]
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-6" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Routing\Middleware\AssetMiddleware.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-6">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="89"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="90"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="91"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$assetFile&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">_getAssetFile</span><span style="color: #007700">(</span><span style="color: #0000BB">$url</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="92"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$assetFile&nbsp;</span><span style="color: #007700">===&nbsp;</span><span style="color: #0000BB">null&nbsp;</span><span style="color: #007700">||&nbsp;!</span><span style="color: #0000BB">file_exists</span><span style="color: #007700">(</span><span style="color: #0000BB">$assetFile</span><span style="color: #007700">))&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="93"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="94"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="95"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="96"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$file&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">File</span><span style="color: #007700">(</span><span style="color: #0000BB">$assetFile</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="97"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$modifiedTime&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$file</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">lastChange</span><span style="color: #007700">();</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-6" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {}
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-7" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\Runner.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-7">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="61"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$next&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">middleware</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">get</span><span style="color: #007700">(</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="62"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$next</span><span style="color: #007700">)&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="63"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">++;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="64"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="65"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="66"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="67"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="68"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;End&nbsp;of&nbsp;the&nbsp;queue</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="69"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-7" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {}
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}
object(Cake\Http\Runner) {
	[protected] index =&gt; (int) 4
	[protected] middleware =&gt; object(Cake\Http\MiddlewareQueue) {
		[protected] queue =&gt; [
			[maximum depth reached]
		]
		[protected] callables =&gt; [
			[maximum depth reached]
		]
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-8" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Error\Middleware\ErrorHandlerMiddleware.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-8">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="77"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">*/</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="78"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">public&nbsp;function&nbsp;</span><span style="color: #0000BB">__invoke</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">)</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="79"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="80"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">try&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="81"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="82"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}&nbsp;catch&nbsp;(\</span><span style="color: #0000BB">Exception&nbsp;$e</span><span style="color: #007700">)&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="83"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">handleException</span><span style="color: #007700">(</span><span style="color: #0000BB">$e</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="84"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="85"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-8" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {}
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-9" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\Runner.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-9">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="61"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$next&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">middleware</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">get</span><span style="color: #007700">(</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="62"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$next</span><span style="color: #007700">)&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="63"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index</span><span style="color: #007700">++;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="64"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="65"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$next</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="66"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="67"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="68"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;End&nbsp;of&nbsp;the&nbsp;queue</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="69"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-9" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {}
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}
object(Cake\Http\Runner) {
	[protected] index =&gt; (int) 4
	[protected] middleware =&gt; object(Cake\Http\MiddlewareQueue) {
		[protected] queue =&gt; [
			[maximum depth reached]
		]
		[protected] callables =&gt; [
			[maximum depth reached]
		]
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-10" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\Runner.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-10">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="47"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="48"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">middleware&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$middleware</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="49"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">index&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">;</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="50"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="51"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">return&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">__invoke</span><span style="color: #007700">(</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="52"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="53"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="54"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">/**</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="55"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">*&nbsp;@</span><span style="color: #0000BB">param&nbsp;</span><span style="color: #007700">\</span><span style="color: #0000BB">Psr</span><span style="color: #007700">\</span><span style="color: #0000BB">Http</span><span style="color: #007700">\</span><span style="color: #0000BB">Message</span><span style="color: #007700">\</span><span style="color: #0000BB">ServerRequestInterface&nbsp;$request&nbsp;&nbsp;The&nbsp;server&nbsp;request</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-10" style="display: none;">
            <pre>object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {}
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-11" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\vendor\cakephp\cakephp\src\Http\Server.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-11">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="86"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">throw&nbsp;new&nbsp;</span><span style="color: #0000BB">RuntimeException</span><span style="color: #007700">(</span><span style="color: #DD0000">'The&nbsp;application&nbsp;`middleware`&nbsp;method&nbsp;did&nbsp;not&nbsp;return&nbsp;a&nbsp;middleware&nbsp;queue.'</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="87"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="88"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">dispatchEvent</span><span style="color: #007700">(</span><span style="color: #DD0000">'Server.buildMiddleware'</span><span style="color: #007700">,&nbsp;[</span><span style="color: #DD0000">'middleware'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$middleware</span><span style="color: #007700">]);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="89"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$middleware</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">add</span><span style="color: #007700">(</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">app</span><span style="color: #007700">);</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="90"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$response&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">runner</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">run</span><span style="color: #007700">(</span><span style="color: #0000BB">$middleware</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$request</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$response</span><span style="color: #007700">);</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="91"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="92"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;(!(</span><span style="color: #0000BB">$response&nbsp;</span><span style="color: #007700">instanceof&nbsp;</span><span style="color: #0000BB">ResponseInterface</span><span style="color: #007700">))&nbsp;{</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="93"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">throw&nbsp;new&nbsp;</span><span style="color: #0000BB">RuntimeException</span><span style="color: #007700">(</span><span style="color: #0000BB">sprintf</span><span style="color: #007700">(</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="94"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'Application&nbsp;did&nbsp;not&nbsp;create&nbsp;a&nbsp;response.&nbsp;Got&nbsp;"%s"&nbsp;instead.'</span><span style="color: #007700">,</span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-11" style="display: none;">
            <pre>object(Cake\Http\MiddlewareQueue) {
	[protected] queue =&gt; [
		(int) 0 =&gt; object(Cake\Error\Middleware\ErrorHandlerMiddleware) {},
		(int) 1 =&gt; object(Cake\Routing\Middleware\AssetMiddleware) {},
		(int) 2 =&gt; object(Cake\Routing\Middleware\RoutingMiddleware) {},
		(int) 3 =&gt; object(App\Application) {}
	]
	[protected] callables =&gt; [
		(int) 0 =&gt; object(Cake\Error\Middleware\ErrorHandlerMiddleware) {},
		(int) 1 =&gt; object(Cake\Routing\Middleware\AssetMiddleware) {},
		(int) 2 =&gt; object(Cake\Routing\Middleware\RoutingMiddleware) {},
		(int) 3 =&gt; object(App\Application) {}
	]
}
object(Zend\Diactoros\ServerRequest) {
	[protected] headers =&gt; [
		&#039;user-agent&#039; =&gt; [
			(int) 0 =&gt; &#039;curl/7.46.0&#039;
		],
		&#039;accept&#039; =&gt; [
			(int) 0 =&gt; &#039;*/*&#039;
		],
		&#039;origin&#039; =&gt; [
			(int) 0 =&gt; &#039;http://localhost:9000&#039;
		],
		&#039;access-control-request-method&#039; =&gt; [
			(int) 0 =&gt; &#039;POST&#039;
		],
		&#039;access-control-request-headers&#039; =&gt; [
			(int) 0 =&gt; &#039;X-Requested-With&#039;
		],
		&#039;content-type&#039; =&gt; [
			(int) 0 =&gt; &#039;application/x-www-form-urlencoded&#039;
		],
		&#039;Host&#039; =&gt; [
			(int) 0 =&gt; &#039;localhost:8000&#039;
		]
	]
	[protected] headerNames =&gt; [
		&#039;host&#039; =&gt; &#039;Host&#039;,
		&#039;user-agent&#039; =&gt; &#039;user-agent&#039;,
		&#039;accept&#039; =&gt; &#039;accept&#039;,
		&#039;origin&#039; =&gt; &#039;origin&#039;,
		&#039;access-control-request-method&#039; =&gt; &#039;access-control-request-method&#039;,
		&#039;access-control-request-headers&#039; =&gt; &#039;access-control-request-headers&#039;,
		&#039;content-type&#039; =&gt; &#039;content-type&#039;
	]
	[private] attributes =&gt; [
		&#039;base&#039; =&gt; &#039;/SANESACTT-backend&#039;,
		&#039;webroot&#039; =&gt; &#039;/SANESACTT-backend/&#039;,
		&#039;session&#039; =&gt; object(Cake\Network\Session) {}
	]
	[private] cookieParams =&gt; []
	[private] parsedBody =&gt; []
	[private] queryParams =&gt; []
	[private] serverParams =&gt; [
		&#039;REDIRECT_REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;REDIRECT_STATUS&#039; =&gt; &#039;200&#039;,
		&#039;HTTP_HOST&#039; =&gt; &#039;localhost:8000&#039;,
		&#039;HTTP_USER_AGENT&#039; =&gt; &#039;curl/7.46.0&#039;,
		&#039;HTTP_ACCEPT&#039; =&gt; &#039;*/*&#039;,
		&#039;HTTP_ORIGIN&#039; =&gt; &#039;http://localhost:9000&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_METHOD&#039; =&gt; &#039;POST&#039;,
		&#039;HTTP_ACCESS_CONTROL_REQUEST_HEADERS&#039; =&gt; &#039;X-Requested-With&#039;,
		&#039;CONTENT_LENGTH&#039; =&gt; &#039;0&#039;,
		&#039;CONTENT_TYPE&#039; =&gt; &#039;application/x-www-form-urlencoded&#039;,
		&#039;PATH&#039; =&gt; &#039;C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files\Microsoft\Web Platform Installer\;C:\Program Files (x86)\Microsoft ASP.NET\ASP.NET Web Pages\v1.0\;C:\Program Files (x86)\Windows Kits\8.0\Windows Performance Toolkit\;C:\wamp\bin\php\php5.5.12;C:\ProgramData\ComposerSetup\bin;C:\Program Files\Git\cmd;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files\nodejs\;C:\Program Files\Microsoft SQL Server\110\DTS\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\;C:\Program Files (x86)\Microsoft SQL Server\110\Tools\Binn\ManagementStudio\;C:\Program Files (x86)\Microsoft Visual Studio 10.0\Common7\IDE\PrivateAssemblies\;C:\Program Files (x86)\Microsoft SQL Server\110\DTS\Binn\;&#039;,
		&#039;SystemRoot&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;COMSPEC&#039; =&gt; &#039;C:\Windows\system32\cmd.exe&#039;,
		&#039;PATHEXT&#039; =&gt; &#039;.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC&#039;,
		&#039;WINDIR&#039; =&gt; &#039;C:\Windows&#039;,
		&#039;SERVER_SIGNATURE&#039; =&gt; &#039;&lt;address&gt;Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 8000&lt;/address&gt;
&#039;,
		&#039;SERVER_SOFTWARE&#039; =&gt; &#039;Apache/2.4.23 (Win64) PHP/5.6.25&#039;,
		&#039;SERVER_NAME&#039; =&gt; &#039;localhost&#039;,
		&#039;SERVER_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;SERVER_PORT&#039; =&gt; &#039;8000&#039;,
		&#039;REMOTE_ADDR&#039; =&gt; &#039;::1&#039;,
		&#039;DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;REQUEST_SCHEME&#039; =&gt; &#039;http&#039;,
		&#039;CONTEXT_PREFIX&#039; =&gt; &#039;&#039;,
		&#039;CONTEXT_DOCUMENT_ROOT&#039; =&gt; &#039;C:/wamp64/www&#039;,
		&#039;SERVER_ADMIN&#039; =&gt; &#039;wampserver@wampserver.invalid&#039;,
		&#039;SCRIPT_FILENAME&#039; =&gt; &#039;C:/wamp64/www/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REMOTE_PORT&#039; =&gt; &#039;5450&#039;,
		&#039;REDIRECT_URL&#039; =&gt; &#039;/SANESACTT-backend/webroot/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;GATEWAY_INTERFACE&#039; =&gt; &#039;CGI/1.1&#039;,
		&#039;SERVER_PROTOCOL&#039; =&gt; &#039;HTTP/1.1&#039;,
		&#039;REQUEST_METHOD&#039; =&gt; &#039;OPTIONS&#039;,
		&#039;QUERY_STRING&#039; =&gt; &#039;&#039;,
		&#039;REQUEST_URI&#039; =&gt; &#039;/SANESACTT-backend/ubicaciones/buscarUbicaciones.json&#039;,
		&#039;SCRIPT_NAME&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;PHP_SELF&#039; =&gt; &#039;/SANESACTT-backend/webroot/index.php&#039;,
		&#039;REQUEST_TIME_FLOAT&#039; =&gt; (float) 1486058520.998,
		&#039;REQUEST_TIME&#039; =&gt; (int) 1486058520
	]
	[private] uploadedFiles =&gt; []
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\PhpInputStream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://input&#039;
		[private] cache =&gt; &#039;&#039;
		[private] reachedEof =&gt; true
	}
	[private] method =&gt; &#039;OPTIONS&#039;
	[private] requestTarget =&gt; null
	[private] uri =&gt; object(Zend\Diactoros\Uri) {
		[protected] allowedSchemes =&gt; [
			[maximum depth reached]
		]
		[private] scheme =&gt; &#039;http&#039;
		[private] userInfo =&gt; &#039;&#039;
		[private] host =&gt; &#039;localhost&#039;
		[private] port =&gt; (int) 8000
		[private] path =&gt; &#039;/ubicaciones/buscarUbicaciones.json&#039;
		[private] query =&gt; &#039;&#039;
		[private] fragment =&gt; &#039;&#039;
		[private] uriString =&gt; null
	}
}
object(Zend\Diactoros\Response) {
	[protected] headers =&gt; []
	[protected] headerNames =&gt; []
	[private] phrases =&gt; [
		(int) 100 =&gt; &#039;Continue&#039;,
		(int) 101 =&gt; &#039;Switching Protocols&#039;,
		(int) 102 =&gt; &#039;Processing&#039;,
		(int) 200 =&gt; &#039;OK&#039;,
		(int) 201 =&gt; &#039;Created&#039;,
		(int) 202 =&gt; &#039;Accepted&#039;,
		(int) 203 =&gt; &#039;Non-Authoritative Information&#039;,
		(int) 204 =&gt; &#039;No Content&#039;,
		(int) 205 =&gt; &#039;Reset Content&#039;,
		(int) 206 =&gt; &#039;Partial Content&#039;,
		(int) 207 =&gt; &#039;Multi-status&#039;,
		(int) 208 =&gt; &#039;Already Reported&#039;,
		(int) 226 =&gt; &#039;IM used&#039;,
		(int) 300 =&gt; &#039;Multiple Choices&#039;,
		(int) 301 =&gt; &#039;Moved Permanently&#039;,
		(int) 302 =&gt; &#039;Found&#039;,
		(int) 303 =&gt; &#039;See Other&#039;,
		(int) 304 =&gt; &#039;Not Modified&#039;,
		(int) 305 =&gt; &#039;Use Proxy&#039;,
		(int) 306 =&gt; &#039;Switch Proxy&#039;,
		(int) 307 =&gt; &#039;Temporary Redirect&#039;,
		(int) 308 =&gt; &#039;Permanent Redirect&#039;,
		(int) 400 =&gt; &#039;Bad Request&#039;,
		(int) 401 =&gt; &#039;Unauthorized&#039;,
		(int) 402 =&gt; &#039;Payment Required&#039;,
		(int) 403 =&gt; &#039;Forbidden&#039;,
		(int) 404 =&gt; &#039;Not Found&#039;,
		(int) 405 =&gt; &#039;Method Not Allowed&#039;,
		(int) 406 =&gt; &#039;Not Acceptable&#039;,
		(int) 407 =&gt; &#039;Proxy Authentication Required&#039;,
		(int) 408 =&gt; &#039;Request Time-out&#039;,
		(int) 409 =&gt; &#039;Conflict&#039;,
		(int) 410 =&gt; &#039;Gone&#039;,
		(int) 411 =&gt; &#039;Length Required&#039;,
		(int) 412 =&gt; &#039;Precondition Failed&#039;,
		(int) 413 =&gt; &#039;Request Entity Too Large&#039;,
		(int) 414 =&gt; &#039;Request-URI Too Large&#039;,
		(int) 415 =&gt; &#039;Unsupported Media Type&#039;,
		(int) 416 =&gt; &#039;Requested range not satisfiable&#039;,
		(int) 417 =&gt; &#039;Expectation Failed&#039;,
		(int) 418 =&gt; &#039;I&#039;m a teapot&#039;,
		(int) 421 =&gt; &#039;Misdirected Request&#039;,
		(int) 422 =&gt; &#039;Unprocessable Entity&#039;,
		(int) 423 =&gt; &#039;Locked&#039;,
		(int) 424 =&gt; &#039;Failed Dependency&#039;,
		(int) 425 =&gt; &#039;Unordered Collection&#039;,
		(int) 426 =&gt; &#039;Upgrade Required&#039;,
		(int) 428 =&gt; &#039;Precondition Required&#039;,
		(int) 429 =&gt; &#039;Too Many Requests&#039;,
		(int) 431 =&gt; &#039;Request Header Fields Too Large&#039;,
		(int) 444 =&gt; &#039;Connection Closed Without Response&#039;,
		(int) 451 =&gt; &#039;Unavailable For Legal Reasons&#039;,
		(int) 499 =&gt; &#039;Client Closed Request&#039;,
		(int) 500 =&gt; &#039;Internal Server Error&#039;,
		(int) 501 =&gt; &#039;Not Implemented&#039;,
		(int) 502 =&gt; &#039;Bad Gateway&#039;,
		(int) 503 =&gt; &#039;Service Unavailable&#039;,
		(int) 504 =&gt; &#039;Gateway Time-out&#039;,
		(int) 505 =&gt; &#039;HTTP Version not supported&#039;,
		(int) 506 =&gt; &#039;Variant Also Negotiates&#039;,
		(int) 507 =&gt; &#039;Insufficient Storage&#039;,
		(int) 508 =&gt; &#039;Loop Detected&#039;,
		(int) 510 =&gt; &#039;Not Extended&#039;,
		(int) 511 =&gt; &#039;Network Authentication Required&#039;,
		(int) 599 =&gt; &#039;Network Connect Timeout Error&#039;
	]
	[private] reasonPhrase =&gt; &#039;&#039;
	[private] statusCode =&gt; (int) 200
	[private] protocol =&gt; &#039;1.1&#039;
	[private] stream =&gt; object(Zend\Diactoros\Stream) {
		[protected] resource =&gt; resource
		[protected] stream =&gt; &#039;php://memory&#039;
	}
}</pre>
        </div>
    </div>
    <div id="stack-frame-12" style="display:none;" class="stack-details">
        <span class="stack-frame-file">C:\wamp64\www\SANESACTT-backend\webroot\index.php</span>
        <a href="#" class="toggle-link stack-frame-args" data-target="stack-args-12">toggle arguments</a>

        <table class="code-excerpt" cellspacing="0" cellpadding="0">
                            <tr>
                <td class="excerpt-number" data-number="33"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB">$server&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Server</span><span style="color: #007700">(new&nbsp;</span><span style="color: #0000BB">Application</span><span style="color: #007700">(</span><span style="color: #0000BB">dirname</span><span style="color: #007700">(</span><span style="color: #0000BB">__DIR__</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">'/config'</span><span style="color: #007700">));</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="34"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="35"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span><span style="color: #FF8000">//&nbsp;Run&nbsp;the&nbsp;request/response&nbsp;through&nbsp;the&nbsp;application</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="36"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span><span style="color: #FF8000">//&nbsp;and&nbsp;emit&nbsp;the&nbsp;response.</span></span></code></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="37"></td>
                <td class="excerpt-line"><span class="code-highlight"><code><span style="color: #000000"><span style="color: #0000BB">$server</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">emit</span><span style="color: #007700">(</span><span style="color: #0000BB">$server</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">run</span><span style="color: #007700">());</span></span></code></span></td>
            </tr>
                    <tr>
                <td class="excerpt-number" data-number="38"></td>
                <td class="excerpt-line"><code><span style="color: #000000"><span style="color: #0000BB"></span></span></code></td>
            </tr>
                </table>

        <div id="stack-args-12" style="display: none;">
            <pre>No arguments</pre>
        </div>
    </div>

        <div class="error-suggestion">
            <p class="error">
    <strong>Error: </strong>
    Create <em>UbicacionesController::buscarUbicaciones.json()</em> in file: src\Controller\UbicacionesController.php.</p>


<div class="code-dump"><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">namespace&nbsp;</span><span style="color: #0000BB">App</span><span style="color: #007700">\</span><span style="color: #0000BB">Controller</span><span style="color: #007700">;<br /><br />use&nbsp;</span><span style="color: #0000BB">App</span><span style="color: #007700">\</span><span style="color: #0000BB">Controller</span><span style="color: #007700">\</span><span style="color: #0000BB">AppController</span><span style="color: #007700">;<br /><br />class&nbsp;</span><span style="color: #0000BB">UbicacionesController&nbsp;</span><span style="color: #007700">extends&nbsp;</span><span style="color: #0000BB">AppController<br /></span><span style="color: #007700">{<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;</span><span style="color: #0000BB">buscarUbicaciones</span><span style="color: #007700">.</span><span style="color: #0000BB">json</span><span style="color: #007700">()<br />&nbsp;&nbsp;&nbsp;&nbsp;{<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />}</span>
</span>
</code></div>
        </div>

                <p class="customize">
            If you want to customize this error message, create
            <em>src\Template\Error\missing_action.ctp</em>
        </p>
            </div>

    <div class="error-nav">
        <a href="#" class="toggle-link toggle-vendor-frames">toggle vendor stack frames</a>

<ul class="stack-trace">
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-0">
                            <span class="stack-function">&rang; Cake\Controller\Controller-&gt;invokeAction</span>
                        <span class="stack-file">
                            CORE\src\Http\ActionDispatcher.php, line 121                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-1">
                            <span class="stack-function">&rang; Cake\Http\ActionDispatcher-&gt;_invoke</span>
                        <span class="stack-file">
                            CORE\src\Http\ActionDispatcher.php, line 95                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-2">
                            <span class="stack-function">&rang; Cake\Http\ActionDispatcher-&gt;dispatch</span>
                        <span class="stack-file">
                            CORE\src\Http\BaseApplication.php, line 83                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-3">
                            <span class="stack-function">&rang; Cake\Http\BaseApplication-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Http\Runner.php, line 65                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-4">
                            <span class="stack-function">&rang; Cake\Http\Runner-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Routing\Middleware\RoutingMiddleware.php, line 62                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-5">
                            <span class="stack-function">&rang; Cake\Routing\Middleware\RoutingMiddleware-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Http\Runner.php, line 65                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-6">
                            <span class="stack-function">&rang; Cake\Http\Runner-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Routing\Middleware\AssetMiddleware.php, line 93                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-7">
                            <span class="stack-function">&rang; Cake\Routing\Middleware\AssetMiddleware-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Http\Runner.php, line 65                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-8">
                            <span class="stack-function">&rang; Cake\Http\Runner-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Error\Middleware\ErrorHandlerMiddleware.php, line 81                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-9">
                            <span class="stack-function">&rang; Cake\Error\Middleware\ErrorHandlerMiddleware-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Http\Runner.php, line 65                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-10">
                            <span class="stack-function">&rang; Cake\Http\Runner-&gt;__invoke</span>
                        <span class="stack-file">
                            CORE\src\Http\Runner.php, line 51                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-11">
                            <span class="stack-function">&rang; Cake\Http\Runner-&gt;run</span>
                        <span class="stack-file">
                            CORE\src\Http\Server.php, line 90                        </span>
        </a>
        </li>
        <li class="stack-frame vendor-frame">
            <a href="#" data-target="stack-frame-12">
                            <span class="stack-function">&rang; Cake\Http\Server-&gt;run</span>
                        <span class="stack-file">
                            ROOT\webroot\index.php, line 37                        </span>
        </a>
        </li>
</ul>
    </div>

<script type="text/javascript">
function bindEvent(selector, eventName, listener) {
    var els = document.querySelectorAll(selector);
    for (var i = 0, len = els.length; i < len; i++) {
        els[i].addEventListener(eventName, listener, false);
    }
}

function toggleElement(el) {
    if (el.style.display === 'none') {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}

function each(els, cb) {
    var i, len;
    for (i = 0, len = els.length; i < len; i++) {
        cb(els[i], i);
    }
}

window.addEventListener('load', function() {
    bindEvent('.stack-frame-args', 'click', function(event) {
        var target = this.dataset['target'];
        var el = document.getElementById(target);
        toggleElement(el);
        event.preventDefault();
    });

    var details = document.querySelectorAll('.stack-details');
    var frames = document.querySelectorAll('.stack-frame');
    bindEvent('.stack-frame a', 'click', function(event) {
        each(frames, function(el) {
            el.classList.remove('active');
        });
        this.parentNode.classList.add('active');

        each(details, function(el) {
            el.style.display = 'none';
        });

        var target = document.getElementById(this.dataset['target']);
        toggleElement(target);
        event.preventDefault();
    });

    bindEvent('.toggle-vendor-frames', 'click', function(event) {
        each(frames, function(el) {
            if (el.classList.contains('vendor-frame')) {
                toggleElement(el);
            }
        });
        event.preventDefault();
    });
});
</script>
<script id="__debug_kit" data-id="489a3f1f-55bd-4cf1-8483-1b8fb1703b52" data-url="http://localhost:8000/SANESACTT-backend/" src="/SANESACTT-backend/debug_kit/js/toolbar.js"></script></body>
</html>
