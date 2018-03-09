// Get cookie from user
function getCookie(c_name) {
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++){
       x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
       y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
       x=x.replace(/^\s+|\s+$/g,"");
       if (x==c_name) {
         return unescape(y);
       }
    }
 }

// sets cookie for user if no cookie
function setCookie(c_name,value,exdays) {
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
 }

// called to see if Splash Page should be loaded and redirects page
function loadSplashPage() {
    var flag=getCookie("Trekkera");
    if (flag!="yes") {	
      setCookie("Trekkera","yes",365);
      window.location = "./html/splash.html";
   }
}