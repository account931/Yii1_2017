




<div id='calc'>
<h1 class="shadowXR"> Statistics Calculator </h1>




<form name="formm" id="formm" > 


 	Amount <input type="text" id="day" placeholder='Amount' onkeyup='Fdouble()' />
 	Hours <input type="text" id="month" placeholder='Hours' onkeyup='Fdouble()' />  <!-- onkeypress="if((event.keyCode < 48)||(event.keyCode > 57)) event.returnValue=false"-->


   <select size="1" name="activity" id="elementId">
    <option value="v">Venues</option>
    <option value="g" selected>Geocoding</option></select>

<!--</br></br>-->
 	<button type='button' onclick="translaterJQ()" id="convert">Get %</button>
        <button type='button' id='reset' onclick='resetME()'>Reset</button>
 	<!--<p><span id="double"><input type"text" id="dubb" placeholder="dubb"/></span></p>-->
 </form>
</br>
<div id="resultUa"><p id="result"></p></div>
<div id="resultRu"></div>


</br></br>


<p><span id="double"><input type="text" id="dubb" placeholder=""/></span></p>


<!-- Hidden Field-->
<div id="mailfield" style="display:none;margin-top:15px;">
<form action="">
  Your E-mail:<br>
  <input type="text" name="firstname" value="" id="emailFromForm"><br>
  
  <input type="button" value="Send" id="emailSubmit">
</form>
</div><!--End div id="MailField-->



<span id="errmsg"></span>
</div>