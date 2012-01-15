<html>
<head>
    <title>Report My Net : test your freedom </title>
    <script type="text/javascript" charset="utf-8" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-1.1.1.min.css">
</head>
<body>
<noscript>
    <div class="alert-message danger">
        This page requires Javascript. 
    </div>
</noscript>    
<div id="loader" style="background:rgba(0,0,0,0.5);color:white;display:none;height:100%;padding:top:300px;position:fixed;text-align:center;width:100%;z-index:9;">
    Loading, please wait...
</div>
<div class="topbar-wrapper" style="z-index:7">
    <div class="topbar">
        <div class="fill">
            <div class="container">
                <h3><a href="/">Report My Net</a></h3>
                <ul class="nav">
                    <li><a href="http://respectmy.net">Back to RespectMyNet</a></li>
                    <li><a href="faq.html" id="faq">What is this?</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top:10px">
    <div class="row">
        <div class="span16" id="home">
            <h1>Is your freedom restrained by your ISP? </h1>
            <p>Let's check out right now.</p>
            
            <h3>Configurating your browser</h3>
            <p>
                This page uses advanced technics to test your connection.
                You must configure your browser <strong>temporarily</strong> 
                as follows :
            </p>
            <div class="row" id="name">
                <div class="span3">
                    <strong>1</strong> Use a Mozilla browser, like Firefox. 
                    If you do not already, pick one on the website of 
                    <a href="http://www.mozilla.org/" target="_blank">
                        the Mozilla Foundation
                    </a>. It's free and awesome.
                </div>
                <div class="span3">
                    <strong>2</strong> Read the <a href="http://mozilla.gunnars.net/mozilla_howto_aboutconfig.html">tutorial here</a>.
                    Now open your configuration by typing directly 
                    <code>about:config</code> in the URL bar.
                </div>
                <div class="span9" >
                    <strong>3</strong> Add a preference with type "String"called <code>network.security.ports.banned.override</code>
                    with a value of
                    <pre style="width:520px">1,7,9,11,13,15,17,19,20,21,22,23,25,37,42,43,53,77,79,87,95,101,102,103,104,109,110,111,113,115,117,119,123,135,139,143,179,389,465,512,513,514,515,526,530,531,532,540,556,563,587,601,636,993,995,2049,4045,6000
                    </pre>
                </div>
                    
            </div>
            <h3>Test your connection</h2>
            <p>Click on <a href="http://responder.lqdn.fr:21/simple.php" target="_blank">
                this test link</a>. The page should show something like this:
                </p>
<pre>xxx.xxx.xxx.xxx 21
15/01/2012 13:06:15</pre>
                
            <p>If it doesn't please read the <a href="faq.html">FAQ</a></p>
            <h3>Start the test</h2>
            <a id="start" class="btn">Start test</a>
        
        </div>
    <div class="span12" id="reporting" style="display:none;" >
        <h1>Congratulations!</h1>
        <p>You successfully tested your freedom to use the Internet.</p>
        <p>{Insert graph here}</p>
        <h2>Join the fight for freedom, it's easy</h2>
        <p>Using the following form, you will be able to report <strong>anonymously</strong>.</p>
        <p>Doing so, you will help us defend the Net Neutrality. </p>
        <div id="reportingActions" style="">
            <form action="portscanreceive.php" method="post" accept-charset="utf-8" id="portscan_submit">
                <dl>
                    <dt>
                        <label for="id_country">Your country</label>
                    </dt>
                    <dd>
                        <select id="id_country" name="country"> <option selected="selected" value=""></option> <option value="BE">Belgique</option> <option value="BG">Bulgarie</option> <option value="DE">Allemagne</option> <option value="DK">Danemark</option> <option value="EE">Estonie</option> <option value="FI">Finlande</option> <option value="FR">France</option> <option value="EL">Grèce</option> <option value="NL">Pays-Bas</option> <option value="IS">Islande</option> <option value="IE">Irlande</option> <option value="IT">Italie</option> <option value="LV">Lettonie</option> <option value="LT">Lituanie</option> <option value="LU">Luxembourg</option> <option value="MT">Malte</option> <option value="NO">Norvège</option> <option value="PL">Pologne</option> <option value="PT">Portugal</option> <option value="RO">Roumanie</option> <option value="SE">Suède</option> <option value="SK">Slovaquie</option> <option value="SI">Slovénie</option> <option value="ES">Espagne</option> <option value="CZ">République Tchèque</option> <option value="HU">Hongrie</option> <option value="UK">Royaume-Uni</option> <option value="CY">Chypre</option> <option value="AT">Autriche</option> </select>
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <label for="id_operator">Your Internet Service Provider</label>
                    </dt>
                    <dd>
                        <input type="text" name="id_operator" value="" id="id_operator">
                    </dd>
                </dl>

            </form>
            <p> <a href="#" class="btn" id="send">Send your report !</a> </p> 
            <p><a href="#" id="preview">All details about the technical results</a></p>
        </div>

        <pre id="reportingDetails" style="display:none;"></pre>
    </div>
</div>

</div>


<script type="text/javascript" charset="utf-8">
    
$(function(){

    var _RMN = window.RMN;
    var RMN = window.RMN = {
        
    	version: '0.1',
    	source: 'Petko Petkov (architect) http://www.gnucitizen.org',
    	author: 'cocoadaemon',
    	scanner:(function(){
    	    var _instance   = null;
            if (_instance   != null) {
                return _instance;
            }

            var _collection = {};
            var _status = {};
            var _fn         = null;
            function scanner() {
                _fn             = this;
            }
            scanner.prototype   = {
                _preScan : function() {
                    $("#loader").show();
                    $('#home').hide();
                },
                _postScan : function(){
                    
                    $('#reporting').show();
                    $("#loader").hide();
                    
                },
                _isOpen : function( bool ) {
                    return bool?"open":"closed";
                },
                collect : function (target, port, status)
                {
                    _collection[port] = status;
                    // console.log( _collection, target, port, status);
                    
                },
            	scanPort : function (target, page, port) {
                    _fn.collect(target, port, 0);
                    $.ajax({
                        url: target + ':' + port + "/" + page,
                        accepts: "text/html",
                        type: 'post',
                        crossDomain: "true",
                        dataType:"jsonp",
                        complete: function(jqXHR,status) {
                            _status[port] = status;
                        },
                        success: function(data) {
                            _fn.collect(target, port, 1);
                            
                        },
                        error: function( jqXHR, status, errorThrown){
                            console.log(jqXHR, status, errorThrown);
                            _fn.collect(target, port, 0);
                        }
                        
                    });
                    
                },
                scanTarget : function (target, page, ports)
                {
                    _fn._preScan(); // hook : DOM work
                    for (index = 0; index < ports.length; index++){
                        _fn.scanPort(target, page, ports[index]);
                    }
                    _fn._postScan(); // hook : DOM work
                },
                report : function ()
                {
                    console.log( _collection);
                    console.log( _status);
                    $('#reportingDetails').html("");
                    for( i in _collection){
                        msg = "port "+i+" is "+_fn._isOpen(_collection[i]);
                        msg += " and responded with status: "+_status[i];
                        msg += "\n";
                        $('#reportingDetails').append(msg);
                    }

                },
                getData : function()
                {
                    return $.param(_collection);
                }
            };
             _instance = new scanner();
            return _instance;
            })(),

    };
    
    
    $('#start').click(function(e){
        e.preventDefault();
        ports       = [1,7,9,11,13,15,17,19,20,21,22,23,25,37,42,43,53,77,79,80,87,95,101,102,103,104,109,110,111,113,115,117,119,123,135,139,143,179,220,389,443,465,512,513,514,515,526,530,531,532,540,554,556,563,587,601,636,992,993,995,2049,3724,4045,5060,5061,5222,5223,5269,5280,6000,6666,6667,6697,8080];
        target      = "http://responder.lqdn.fr";
        page        = "json.php";
        // target      = "http://<?php echo $_SERVER["HTTP_HOST"];?>";
        // page        = "portscan/json.php";
        RMN.scanner.scanTarget(target,page,ports);
    });
    
    $("#send").live("click",function(e){
        e.preventDefault();
        var form    = $("#portscan_submit");
        var postData = RMN.scanner.getData()+'&'+form.serialize();
        console.log(postData);
        $.ajax({
           url: form.attr("action"),
           // url:"",
           accepts: "text/html",
           type: 'post',
           dataType:"json",
           data: postData,
           complete: function() {},
           success: function(data) {
               alert('Thanks for your tremendous help. Your report has been sent. {Insert call to action : pick one}')
           },
           error: function( jqXHR, status, errorThrown){

               alert('Damn! There was an error while sending your report : '+jqXHR+" "+status+" "+errorThrown);
           }
           
       });
    });
    $("#preview").live('click',function(e) {
        e.preventDefault();
        $('#reportingDetails').toggle();
        window.RMN.scanner.report();
    });
 
    });
   
</script>
<style type="text/css" media="screen">
    body{padding-top:40px;}
    .container label{width:200px;margin-right:16px;}
    #id_operator{font-size:16pt;height:30px;}
</style>
</body>    
</html>
