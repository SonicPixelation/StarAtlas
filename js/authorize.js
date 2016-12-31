document.getElementById("autho").addEventListener("click", function(){
  var baseURL = "https://login.eveonline.com/oauth/authorize";

  var redirect_uri="YOUR REDIRECT HERE"; // insert your oauth reidrect here
  var client_id = "YOUR CLIENT ID HERE"; //insert your client id here

  var response_type = "?response%5Ftype=code";

  var scope = "&scope=characterLocationRead";
  var state= "&state=test";

  var data = baseURL + response_type + redirect_uri + client_id + scope + state;
  document.location.href = data;
});
