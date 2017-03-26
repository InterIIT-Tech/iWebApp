// Copyright (c) 2014 The Chromium Authors. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

/**
 * Get the current URL.
 *
 * @param {function(string)} callback - called when the URL of the current tab
 *   is found.
 */

var webRoot = "http://localhost/~muks/iwa/";
// var webRoot = "http://www.iwebapp.ml/";

 $(document).ready(function(){

         $('#login form input').keypress(function(e){
          if(e.keyCode==13)
          $('#loginSubmit').click();
        });
        $("#loginSubmit").click(function(){
            $("#load").fadeIn();
            
            var usrname=$("#uname").val();
            var pswd=$("#pswd").val();
            if (usrname=='' || usrname==null){
            console.log("Request not Sent 1;");
                $("#load").fadeOut();
                $("#loginSubmit").fadeIn();
            } else if (pswd=='' || pswd ==null){
            console.log("Request not Sent 2;");
                $("#load").fadeOut();
                $("#loginSubmit").fadeIn();
            }else{
            console.log("Request Sent;");
            console.log("Request : "+ usrname+";");
            $.post(webRoot + "cAPI/userLogin",
                        {                    
                        username: usrname,
                        pswd: pswd
                        },
                        function(data, status){
                        console.log("Response");
                        console.log("Data: " + data + "\nStatus: " + status);
                            if(status=='success'){//$("#myloader").fadeOut();
                                // $("#load").fadeOut();
                                $("#loginSubmit").fadeIn();
                                console.log(data);

                                if(data[0]==1){
                                    $(".inner").slideUp(600);
                                    window.location="";
                                }else{
                                  $("#error").fadeIn();
                                  $("#error").val(data[1]);
                                }
 
                            }else{
                              $("#error").fadeIn();
                                $("#load").fadeOut();
                                $("#loginSubmit").fadeIn();
                                $("#error").val('An error occured. Please try again.');
                                console.log("Failed "+data);
                            }
                    }
            ,"json");}
        });

        // Add links to page
        // $('#logout').attr('href', webRoot + 'logout');
        $('#classesln').attr('href', webRoot + 'timetable');
        $('#assignln').attr('href', webRoot + 'assignments');

         $("#icon1").click(function(){
         chrome.tabs.create({active: true, url: "http://iwebapp.ml"});
         return false;
         });
         // $('#logout').click();

         $.post(webRoot + "cAPI/checkLogin",
                              {},
                              function(data, status){
                              console.log("Checklogin Data: " + data + "\nStatus: " + status);
                              if(status=='success'){
                                  if(data[0]==0){
                                    $('#content').hide();
                                    $('#login').show();
                                  }
                                }else{
                                window.location.reload();
                              }
                          }
                  ,"json");

         $.post(webRoot + "cAPI/listAssign",
                    {},
                    function(data, status){
                    console.log("Response");
                    console.log(data);
                        if(status=='success'){
                            if(data[0]==1){
                          var dataObject=data[2];
                          for(var i=0;i<data[1];i++){
                             // $("#assignList").append('<li><a href="assignments"> '+dataObject[i]['aName']+' <span> Uploaded:'+dataObject[i]['uploaded']+'</span> </a></li>');
                             $(".assign").prepend('<a target="_blank" href="'+webRoot+'assignments"><li class="fa fa-arrow-circle-right itemAssign" data="'+dataObject[i]['aID']+'"> '+dataObject[i]['aName']+'</li>');
                          }
                        }
                        }
                }
        ,"json");

         //  $.post(webRoot + "cAPI/listAssign",
         //                      {},
         //                      function(data, status){
         //                      console.log("Response1");
         //                      console.log(data[2]);
         //                      console.log("Data: " + data[2] + "\nStatus: " + status);
         //                          if(status=='success'){
         //                              if(data[0]==1){
         //                            var dataObject=data[2];
         //                            for(var i=0;i<data[1];i++){
         //                               // $("#assign").prepend('<li><a class="assignments_left " href="assignments/view/'+dataObject[i]['aID']+'">'+dataObject[i]['aName']+'</a></li>');
         //                               $(".assign").prepend('<a target="_blank" href="'+webRoot+'assignments"><li class="fa fa-arrow-circle-right itemAssign" data="'+dataObject[i]['aID']+'"> '+dataObject[i]['aName']+'</li>');
         //                            }
         //                          }
         //                          }else{
         //                            // window.location="";
         //                            // location.reload(true);
         //                            window.location.reload();

         $.post(webRoot + "cAPI/classTmw",
                    {},
                    function(data, status){
                    console.log("Response 2");
                    console.log("Data: " + data + "\nStatus: " + status);
                        if(status=='success'){
                            if(data[0]==1){
                          var dataObject=data[2];
                          for(var i=0;i<data[1];i++){
                             // $("#clTmw").prepend('<li>'+dataObject[i]+'</li>');
                             $('.classes').prepend('<li class="fa fa-arrow-circle-right"> '+dataObject[i]['code']+': '+dataObject[i]['time']+'</li>');
                          }
                        }
                        }else{
                          // window.location="";
                          // location.reload(true);
                          window.location.reload();

                        }
                }
        ,"json");

         //                          }
         //                  }
         //          ,"json");
         //  $.post(webRoot + "cAPI/classTmw",
         //                      {},
         //                      function(data, status){
         //                      console.log("Response2");
         //                      console.log(data[2]);
         //                      console.log("Data: " + data + "\nStatus: " + status);
         //                      var href=null;
         //                          if(status=='success'){
         //                              if(data[0]==1){
         //                            var dataObject=data[2];
         //                            for(var i=0;i<data[1];i++){
         //                               href=(dataObject[i]['url'])?"href="+dataObject[i]['url']:"";
         //                               $('.classes').prepend('<li class="fa fa-arrow-circle-right"> '+dataObject[i]+'</li>');
         //                            }
         //                          }
         //                          }else{
         //                            // window.location="";
         //                            // location.reload(true);
         //                            window.location.reload();

         //                          }
         //                  }
         //          ,"json");

         $.post(webRoot + "cAPI/getNotif",
                    {},
                    function(data, status){
                    console.log("Response");
                    console.log("Data: " + data + "\nStatus: " + status);
                    var href=null;
                        if(status=='success'){//$("#myloader").fadeOut();
                            if(data[0]==1){
                          var dataObject=data[2];
                          for(var i=0;i<data[1];i++){
                            href=(dataObject[i]['url'])?webRoot+dataObject[i]['url']:"";
                            // console.log('href is...' + href + '...');
                             // $("#notifPanel").append('<li><div class="article-post"> <span class="user-info"> By: '+dataObject[i]['author']+' / Date & Time :  '+ dataObject[i]['timestr']+'</span><p><a '+href+'>'+dataObject[i]['title']+'</a> </p></div></li>');
                             if(href==""){
                                         if(dataObject[i]['author']==null){
                                          $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"> '+dataObject[i]['title']+'</li>');
                                         }
                                         else {
                                          $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"> <strong> '+dataObject[i]['author']+'</strong> :'+dataObject[i]['title']+'</li>');
                                         }
                             } else {
                                        if(dataObject[i]['author']==null){
                                          $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"> <a target="_blank" href="'+href+'"> '+dataObject[i]['title']+'</a></li>');
                                         }
                                         else {
                                          $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"><a target="_blank" href="'+href+'"> <strong> '+dataObject[i]['author']+'</strong> :'+dataObject[i]['title']+'</a></li>');
                                         }
                             }
                          }
                        }
                        }else{
                          // window.location="";
                          // location.reload(true);
                          window.location.reload();
                        }
                }
        ,"json");

         //  $.post(webRoot + "cAPI/getNotif",
         //                      {},
         //                      function(data, status){
         //                      console.log("Response3");
         //                      console.log(data[2]);
         //                      console.log("Data: " + data + "\nStatus: " + status);
         //                      var href=null;
         //                          if(status=='success'){
         //                              if(data[0]==1){
         //                            var dataObject=data[2];
         //                            for(var i=0;i<data[1];i++){
         //                               // $("#assign").prepend('<li><a class="assignments_left " href="assignments/view/'+dataObject[i]['aID']+'">'+dataObject[i]['aName']+'</a></li>');
                                       // href=(dataObject[i]['url'])?"href="+dataObject[i]['url']:"";
                                       // if(href==""){
                                       //   if(dataObject[i]['author']==null){
                                       //    $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"> '+dataObject[i]['title']+'</li>');
                                       //   }
                                       //   else {
                                       //    $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"> <strong> '+dataObject[i]['author']+'</strong> :'+dataObject[i]['title']+'</li>');
                                       //   }
                                       // } else {
                                       //  if(dataObject[i]['author']==null){
                                       //    $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"> <a target="_blank" href="'+href+'"> '+dataObject[i]['title']+'</a></li>');
                                       //   }
                                       //   else {
                                       //    $("#notifPanel").prepend('<li class="fa fa-arrow-circle-right"><a target="_blank" href="'+href+'"> <strong> '+dataObject[i]['author']+'</strong> :'+dataObject[i]['title']+'</a></li>');
                                       //   }
                                       // }
         //                            }
         //                          }
         //                          }else{
         //                            // window.location="";
         //                            // location.reload(true);
         //                            window.location.reload();

         //                          }
         //                  }
         //          ,"json");

       $('button').click(function(){
         var opt = {
         type: "basic",
         title: "iWebApp",
         message: "iWebApp",
         iconUrl: "icon.png"
         };
         chrome.notifications.create(opt);
       });
   });

function getCurrentTabUrl(callback) {
  // Query filter to be passed to chrome.tabs.query - see
  // https://developer.chrome.com/extensions/tabs#method-query
  var queryInfo = {
    active: true,
    currentWindow: true
  };

  chrome.tabs.query(queryInfo, function(tabs) {
    // chrome.tabs.query invokes the callback with a addEventListener```````````   of tabs that match the
    // query. When the popup is opened, there is certainly a window and at least
    // one tab, so we can safely assume that |tabs| is a non-empty array.
    // A window can only have one active tab at a time, so the array consists of
    // exactly one tab.
    var tab = tabs[0];

    // A tab is a plain object that provides information about the tab.
    // See https://developer.chrome.com/extensions/tabs#type-Tab
    var url = tab.url;

    // tab.url is only available if the "activeTab" permission is declared.
    // If you want to see the URL of other tabs (e.g. after removing active:true
    // from |queryInfo|), then the "tabs" permission is required to see their
    // "url" properties.
    console.assert(typeof url == 'string', 'tab.url should be a string');

    callback(url);
  });

  // Most methods of the Chrome extension APIs are asynchronous. This means that
  // you CANNOT do something like this:
  //
  // var url;
  // chrome.tabs.query(queryInfo, function(tabs) {
  //   url = tabs[0].url;
  // });
  // alert(url); // Shows "undefined", because chrome.tabs.query is async.
}

/**
 * @param {string} searchTerm - Search term for Google Image search.
 * @param {function(string,number,number)} callback - Called when an image has
 *   been found. The callback gets the URL, width and height of the image.
 * @param {function(string)} errorCallback - Called when the image is not found.
 *   The callback gets a string that describes the failure reason.
 */

function renderStatus(statusText) {
  document.getElementById('status').textContent = statusText;
}

document.addEventListener('DOMContentLoaded', function() {
  // getCurrentTabUrl(function(url) {
  //   // Put the image URL in Google search.
  //   renderStatus('Performing Google Image search for ' + url);
  // });

});
