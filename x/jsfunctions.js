function header (){
	
	

setInterval( "refresh();", 5000 );  ///// REPEAT THE FOLLOWING OVER AND OVER AND OVER!!!
$(function() {refresh = function(){

$.get("http://www.dirtpage.com/topfeed.php", function(data) {$('#ticker').html(data);  });}
});
}








function searchh ()

{
	
document.form1.topic.value = document.form1.topic.value.replace(/[^a-zA-Z0-9 ]/g, "");
document.form1.topic.value = document.form1.topic.value.replace(/^\s+|\s+$/g, "");
document.form1.topic.value = document.form1.topic.value.replace(/[\s][\s]+/g, " ");
if (document.form1.topic.value != ""){

		$.get("http://www.dirtpage.com/search.php/results/", { topic: document.form1.topic.value}  );
	
window.location.href="search.php?topic="+document.form1.topic.value.replace(/ /g, "+");}
}




function setexpand() {
$('.expandable').each(function(index) {
var s = $(this);
$.get("http://www.dirtpage.com/expandfiller.php", {topic: $(this).text()},  function(data) {
s.parent().parent().parent().append(data);   }    );
	})
	

$('.expandable').mouseenter(function(){
	
$(this).parent().parent().nextAll(".extra").slideToggle("fast");
}); 

}



function setcards ()
  {
	$('.results').hide();
$('.results2').hide();
	
  

$('#output').delegate('.card', "mouseover", function(){
	
$.get("http://www.dirtpage.com/divfiller2.php", {topic: $(this).text()},  function(data) {
$('.results').html(data); $('.results').fadeIn("slow");  });});

$(".results").delegate( ".card", "mouseover", function() { 
$.get("http://www.dirtpage.com/divfiller2.php", {topic: $(this).text()},  function(data) {
$('.results2').html(data); $('.results2').fadeIn("slow");	
})  } )

$('.results').delegate('.search', "mouseenter", function(){ 
$.get("http://www.dirtpage.com/minisearchfiller.php", {topic: $('.results .topic').text()},  function(data) {
$('.results2').html(data); $('.results2').fadeIn("slow");
 });}  )

$(".results2").delegate( ".card", "mouseover", function() { 
$.get("http://www.dirtpage.com/divfiller2.php", {topic: $(this).text()},  function(data) {
$('.results').html(data); $('.results2').fadeIn("slow");	
})  } )


$('.results2').delegate('.search', "mouseenter", function(){ 
$.get("http://www.dirtpage.com/minisearchfiller.php", {topic: $('.results2 .topic').text()},  function(data) {
$('.results').html(data); $('.results2').fadeIn("slow");
 });}  )
   

}
