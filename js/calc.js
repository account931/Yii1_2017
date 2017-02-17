//MAIN  WORKING FILE, script.js  contains  only  1-2  functions, like  digits  check (?????)
$(document).ready(function(){



window.result;
















/*Checking if AMOUNT is Numbers */
      $("#day").keypress(function (waze)  // any argument name 
    { 
      
      if( waze.which!=8 && waze.which!=0 && (waze.which<48 || waze.which>57))
      {
       
        $("#errmsg").html("Digits Only").show().fadeOut(1000); 
        return false; // forbid printing at all 
      }    
    });    

 /*alert('Numbers  ONLY');*/


   $("#month").keypress(function (e)  /*Checking  Numbers Hours  field */
    { 
      
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)&& e.which!=46)
      {
        /*alert('&#1058;&#1086;&#1083;&#1100;&#1082;&#1086; &#1094;&#1099;&#1092;&#1088;&#1099;');*/
        $("#errmsg").html("Digits Only").show().fadeOut(1000); 
        return false;
      }    
    });
/*END of Checking if Numbers */





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// START Redispalying  input  key in ERROR  Div (DIGITS ONLY)
$('input').bind('keydown',function(evt){
   // alert(evt.keyCode); //  dispalay  ASCI  char only
   //alert(String.fromCharCode(evt.keyCode));
   var KeyPressed=String.fromCharCode(evt.keyCode);
 $("#errmsg").html(KeyPressed).show().fadeOut(1000); 
});



/*
$('input').on('keydown', function(e) {
  alert(e.key);
});*/
// END Redispalying  input  key in ERROR  Div (DIGITS ONLY)
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// AJAX SEND  TO  PHP on  button click  (in mail  form)
$("#emailSubmit").click(function(){
    
     // alert('pass');
      // GETTING e-MAIL
      var emailX=$('#emailFromForm').val(); //alert(emailX);

          // send  the  name,photo  etc  to  PHP handler  ************ 
                              $.ajax({
                                 url: 'http://waze.esy.es/yii2016/production_release/phpMailHandler.php',
                                 type: 'GET',
                                 data: { emailPH:emailX, scorePH:result},
                                 success: function(data) {
                                 // do something;
                                 //alert('done SQL');$('#vkTest').html(data)
                                 // $('#result').html(data);
                                  $("#errmsg").html(data).show().fadeOut(2500);
                                  }
                                          });
                                                   // }
                                               //  END AJAXed  part 


$("#mailfield").hide(100);

});
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************










//  END  DOCUMENT  READY function;
  });









// **************************************************************************************
// **************************************************************************************
// **                                                                                  ** 
//SHould  be  outlined   out  of  READY  fuction 
//  Button  click procedures (have  the similar  function in script.js (function translater()) )
function translaterJQ(){
 var selected=$("#elementId").val();
  //alert(selected);
window.amount=$("#day").val();
window.hours=$("#month").val();
if (selected=="g")  
                {Ge();}
else if(selected=="v") 
               {Ve();}

// End  function translaterJQ
}
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************










//if Geocod was  selected
// **************************************************************************************
// **************************************************************************************
// **                                                                                  ** 
function Ge(){
var requested=hours*30; //alert("Must  be"+requested);
var stage2=amount/requested;
window.result=stage2*100;  //alert(result);
  $('#resultUa').html("Must  be done "+requested +" geo");
  $('#resultRu').html('You scored  '+result +' % </br><span id="email">Send me the  results by  e-mail</span>') ;
     
//  roundin  % result to 5  digits and display it in Dubb(upper div)+link to email
        SetDubbTextAndEmail (result);


//Overal Performance  Rating Display in ERROR  DIV
      EvalSetFlashText(result);
//END Overal Performance  Rating Display in ERROR  DIV
}

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************












//if  Ven  was  selected
// **************************************************************************************
// **************************************************************************************
// **                                                                                  ** 
function Ve(){
//alert("In V");
var requested=hours*44; //alert("Must  be"+requested);
var stage2=amount/requested;
window.result=stage2*100;  //alert(result);
  $('#resultUa').html("Must  be done "+requested + " venues");
  $('#resultRu').html('You scored  '+result +' % </br><span id="email">Email me the  results</span>') ;

    //  roundin  % result to 5  digits and display it in Dubb(upper div)+link to email
        SetDubbTextAndEmail (result);

//Overal Performance  Rating Display in ERROR  DIV
      EvalSetFlashText(result);
//END Overal Performance  Rating Display in ERROR  DIV

}
//
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************











// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// reseting all  fields                                                                 
function resetME (){
//alert("res");
$('#day,#month,#dubb').val('')
$('#resultUa,#resultRu').html('');
}

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// Evaluate and set flash text in ERROR div                                                                
function EvalSetFlashText (resultMy){
if(resultMy<100){var performance="Below the  expected"} else {var performance="Excellent  performance"}
$("#errmsg").html(performance).show().fadeOut(1500);
}

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// sett the text to dubb div+E mail link                                                             
function SetDubbTextAndEmail (resultMy){
var result_Rounded = resultMy.toFixed(5);
  $('#dubb').val('You scored  '+ result_Rounded +' %');
  //$('body').append('<p id="ggg" style="height:100px;background:red;">Appended item</p>');
}

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************





// **************************************************************************************
// **************************************************************************************
// **  
// Show /  hide  Email  Div                                                                                **
// Syntax  click  for  a  newly  generated  elements
 $(document).on("click", '#email', function() {
 //alert('b');
$("#mailfield").toggle(100);

}); 

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************























//-----------------------------------------------

//This  file  is  not  used????




// IT is  used  in  counting !!!!!!!!!!!!!
// get 1st and  second  input  and  redispaly  it  in red color;
//wht use  argument

function Fdouble(waze){
var vv=document.getElementById('day').value;
var vm=document.getElementById('month').value;
var bb=parseInt(bb);
var cl=document.getElementById('dubb')

document.getElementById('dubb').value=vv+' '+' '+vm;


//get  the  value  of  pressed  key  &  dispaly it in ERROR  div (where  digits  only)
//var keyPressed=e.key; /*String.fromCharCode();*/  /*String.fromCharCode(waze.keyCode);*/
//alert(keyPressed);
//$("#errmsg").html(keyPressed).show().fadeOut(1000); 


}
// end function Fdouble(waze)
























/*
  function resetR(){ //Clear the form
document.getElementById('day').value=null;
document.getElementById('month').value=null;
document.getElementById('year').value=null;
document.getElementById('resultUa').innerHTML=null;
document.getElementById('resultRu').innerHTML=null;
document.getElementById('dubb').value=null;
}

*/







//------------------------------------------------------------

function news()
{document.getElementById("first").style.display="none";
 document.getElementById("second").style.display="block";
 document.getElementById("third").style.display="none";
 document.getElementById("butt1").style.backgroundColor="white";
 document.getElementById("butt2").style.backgroundColor="yellow";
 document.getElementById("butt3").style.backgroundColor="white";
}



function contact()
{document.getElementById("second").style.display="none";
 document.getElementById("first").style.display="none";
 document.getElementById("third").style.display="block";
 document.getElementById("butt2").style.backgroundColor="white";
 document.getElementById("butt3").style.backgroundColor="yellow";
document.getElementById("butt1").style.backgroundColor="white";}




function about()
{document.getElementById("second").style.display="none";
 document.getElementById("third").style.display="none";
 document.getElementById("first").style.display="block";
 document.getElementById("butt3").style.backgroundColor="white";
 document.getElementById("butt1").style.backgroundColor="yellow";
 document.getElementById("butt2").style.backgroundColor="white";
}






function translater() {
var x = document.getElementById('day').value;
var y = document.getElementById('month').value;

         if (y==1)
      { y='January';}
         else if (y==2)
                 { y='February';}
         else if (y==3)
                 { y='March';}
         else if (y==4)
                 { y='April';}
         else if (y==5)
                 { y='May';}
         else if (y==6)
                 { y='June';}
         else if (y==7)
                 { y='July';}
         else if (y==8)
                 { y='August';}
         else if (y==9)
                 { y='September';}
         else if (y==10)
                 { y='October';}
         else if (y==11)
                 { y='November';}
         else if (y==12)
                 { y='December';} 

       /*  var monthR=['February','March'];
         var monthR=month;*/

/*
      switch(y){
case 1:
     y='January';
     break;
case 2:
     y='February';
     break;
case 3:
     y='March';
     break;
case 4:
     y='April';
     break;
}
*/

var z = document.getElementById('year').value;
        var st=document.getElementById('resultUa')
        var wtf=st.innerHTML='Current Date is'+' '+x+' '+y+' '+z+' ';
        
        /*document.write(wtf);*/
          




/*function Language russian*/

        var d=y;

         if (d=='January')
      { d='&#1071;&#1085;&#1074;&#1072;&#1088;&#1100;';}
         else if (d=='February')
                 { d='&#1060;&#1077;&#1074;&#1088;&#1072;&#1083;&#1100;';}
         else if (d=='March')
                 { d='&#1052;&#1072;&#1088;&#1090;';}
         else if (d=='April')
                 { d='&#1040;&#1087;&#1088;&#1077;&#1083;&#1100;';}
         else if (d=='May')
                 { d='&#1052;&#1072;&#1081;';}
         else if (d=='June')
                 { d='&#1048;&#1102;&#1085;&#1100;';}
         else if (d=='July')
                 { d='&#1048;&#1102;&#1083;&#1100;';}
         else if (d=='August')
                 { d='&#1040;&#1074;&#1075;&#1091;&#1089;&#1090;';}
         else if (d=='September')
                 { d='&#1057;&#1077;&#1085;&#1090;&#1103;&#1073;&#1088;&#1100;';}
         else if (d=='October')
                 { d='&#1054;&#1082;&#1090;&#1103;&#1073;&#1088;&#1100;';}
         else if (d=='November')
                 { d='&#1053;&#1086;&#1103;&#1073;&#1088;&#1100;';}
         else if (d=='December')
                 { d='&#1044;&#1077;&#1082;&#1072;&#1073;&#1088;&#1100;';}
    

        var ss=document.getElementById('resultRu')
        var not=ss.innerHTML='&#1057;&#1077;&#1075;&#1086;&#1076;&#1085;&#1103;'+' '+x+' '+d+' '+z ;
        alert(wtf+'\n'+not);
     }
     

      
/*END of function Language russian*/
















/*function translater()
 {var x=document.getElementById("day").value;
  var y=document.getElementById("month").value;
  var z=document.getElementById("year").value;
        document.getElementById("resultUa").innerHTML=x;}*/
 







  /*Checking if Numbers
 function chechIt()
 {
var rest=document.getElementById('day').value;
if (rest<48||rest>57)
{alert("Lucky");}


*/



/*
	if (value=='') {
		return true;
	}
	var parsedValue=parseInt(value);
	if (parsedValue<0) {
		return false;
	}
	if (parsedValue!=value) {
		return false;
	}
	return true;
} */
/*
{return !isNaN(parseFloat(x)) && isFinite(x)}*/












