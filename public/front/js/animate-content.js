var appMaster = {
animateScript: function(){
	
$('.product_left').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});

$('.banner_Txt p').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});

$('.why_Txt h2').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});

$('.why_Txt p').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});

$('.our_service h2').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});

$('.our_service p').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});


$('.create-sec .wrapper').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});   

$('.partner-sec .wrapper').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});

$('footer').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});    

$('.moreBtn').waypoint(function(){
$(this).toggleClass('animated fadeInUp');
},{offset:'100%'});

}
};





$(document).ready(function() {
//var winWidth = $(window).width();
//if(winWidth>767){
//appMaster.animateScript();
//}

});