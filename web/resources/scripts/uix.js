/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    $('body').height(($(window).height()-20) + "px");
    $('#wrapper').height($('body').height()+"px");
    $('#left').height($('body').height()+"px");
    $('#users').height(($('#left').height()-40)+"px");
    $('#right').height($('body').height()+"px");
    $('#top').height(($('#right').height()-120)+"px");
    $('#messages').height(($('#top').height()-40)+"px");
    $('#bottom').height("100px");
    $('#message').height(($('#bottom').height()-40)+"px");
});