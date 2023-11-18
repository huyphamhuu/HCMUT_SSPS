

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">








<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
	    <title>HCMUT &#8211; Central Authentication Service</title>
        
		
        <link type="text/css" rel="stylesheet" href="/cas/css/cas.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	    <link rel="icon" href="/cas/favicon.ico" type="image/x-icon" />
	</head>
	<body id="cas" class="fl-theme-iphone">
    <div class="flc-screenNavigator-view-container">
        <div class="fl-screenNavigator-view">
            <div id="header" class="flc-screenNavigator-navbar fl-navbar fl-table">
              <div id="app-name" class="fl-table-cell">
                <img alt="BK" src="images/bk_logo.png">
                <h1>Central Authentication Service</h1>
                
              </div>
            </div>		
            <div id="content" class="fl-screenNavigator-scroll-container">




  <div class="box fl-panel" id="login">
			<form id="fm1" class="fm-v clearfix" action="/cas/login?service=https%3A%2F%2Fe-learning.hcmut.edu.vn%2Flogin%2Findex.php%3FauthCAS%3DCAS" method="post">
                  
                <!-- Congratulations on bringing CAS online!  The default authentication handler authenticates where usernames equal passwords: go ahead, try it out. -->
                    <h2>Enter your Username and Password</h2>
                    <div class="row fl-controls-left">
                        <label for="username" class="fl-label"><span class="accesskey">U</span>sername</label>
						

						
						
						<input id="username" name="username" class="required" tabindex="1" accesskey="u" type="text" value="" autocomplete="false"/>
						
                    </div>
                    <div class="row fl-controls-left">
                        <label for="password" class="fl-label"><span class="accesskey">P</span>assword</label>
						
						
						<input id="password" name="password" class="required" tabindex="2" accesskey="p" type="password" value="" autocomplete="off"/>
                    </div>
                    <div class="row check">
                        <input id="warn" name="warn" value="true" tabindex="3" accesskey="w" type="checkbox" />
                        <label for="warn"><span class="accesskey">W</span>arn me before logging me into other sites.</label>
                    </div> 
                    <div class="row btn-row">
						<input type="hidden" name="lt" value="LT-10200470-UnFYGlteCaySxW4Eq1N6mWmDbCwW41" />
						<input type="hidden" name="execution" value="e2s1" />
						<input type="hidden" name="_eventId" value="submit" />
                        <input class="btn-submit" name="submit" accesskey="l" value="Login" tabindex="4" type="submit" />
						<input class="btn-reset" name="reset" accesskey="c" value="Clear" tabindex="5" type="reset" />
                    </div>
                    <div class="row support">
	                    <ul>
	                		<li class="first">
	                			<a href="https://account.hcmut.edu.vn/">Change password?</a> 
	                		</li>
	                	</ul>
	            </div>
            </form>
          </div>
            <div id="sidebar">
				<div class="sidebar-content">
                <div id="list-languages" class="fl-panel">
                
					
                    
                  <h3>Languages</h3>
                  
                     
                     
                        
						<ul
							><li class="first"><a href="login?service=https%3A%2F%2Fe-learning.hcmut.edu.vn%2Flogin%2Findex.php%3FauthCAS%3DCAS&locale=vi">Vietnamese</a></li
							><li><a href="login?service=https%3A%2F%2Fe-learning.hcmut.edu.vn%2Flogin%2Findex.php%3FauthCAS%3DCAS&locale=en">English	</a></li
						></ul>
                     
                   
                </div>
                <div id="list-notes" class="fl-panel">
                	<h3>Please note</h3>
                	<p class="fl-panel fl-note fl-bevel-white fl-font-size-80">The Login page enables single sign-on to multiple websites at HCMUT. This means that you only have to enter your user name and password once for websites that subscribe to the Login page.

</p>
                	<p class="fl-panel fl-note fl-bevel-white fl-font-size-80">You will need to use your HCMUT Username and password to login to this site. The "HCMUT" account provides access to many resources including the HCMUT Information System, e-mail, ... </p>
                	<p class="fl-panel fl-note fl-bevel-white fl-font-size-80">For security reasons, please Exit your web browser when you are done accessing services that require authentication!</p>
                </div>
                
                <div id="list-supports" class="fl-panel">
                	<h3>Technical support</h3>
                	<ul>
                		<li class="first">
                			E-mail: <a href="mailto:support@hcmut.edu.vn">support@hcmut.edu.vn</a>
                		</li>
                		<li>
                			Tel: (84-8) 38647256 - 5200
                		</li>
                	</ul>
				</div>                
			  </div>
            </div>



</div>
                <div id="footer" class="fl-panel fl-note fl-bevel-white fl-font-size-80">
                	<a id="hcmut" href="http://www.hcmut.edu.vn" title="go to HCMUT home page"></a>
                    <div id="copyright">
                        <p>Copyright &copy; 2011 - 2012 Ho Chi Minh University of Technology. All rights reserved.</p>
                        <p>Powered by <a href="http://www.jasig.org/cas">Jasig CAS 3.5.1</a></p>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/cas/js/cas.js"></script>
    </body>
</html>


