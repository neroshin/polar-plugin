<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script> -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/qs/dist/qs.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<?php 
        global $wpdb;
        $user = wp_get_current_user();
        $userID = $user->ID;
        //print_r($user);
    ?>

<style>
.ideal-week-container{
 background-color:#ffffff;
 border-radius: 18px;
 padding: 16px;
 display:flex;
 flex-flow:column;
 justify-content:center;
 align-items:center;
 box-shadow:  20px 20px 60px #d9d9d9, 
             -20px -20px 60px #ffffff;

}

.ideal-table th{
    border: 1px solid #000000 !important;
    text-align:center;
    padding: 0px !important;
    background-color: #dab05e;
}
.ideal-table tbody td{
    border: 1px solid #000000 !important;
     padding: 0px !important;
    text-align:center;
}
.ideal-table tbody td p{
    font-size: 12px;
}
.ideal-table tbody tr:nth-child(even){
    background-color:#ececec;
}

.cell-input{
    width: 100%;
    height: 100%;
    font-size: 18px;
    border-top: 0px !important;
    border-left: 0px !important;
    border-right: 0px !important;
}

.save-btn{
    cursor:pointer;background-color:#009f3c; border:none; padding:24px 48px;box-shadow:  20px 20px 60px #d9d9d9,-20px -20px 60px #ffffff; border-radius: 18px;color:white;font-size:1.5rem;
}
.save-btn:hover{
    background-color:#00af42;
}




</style>

    <div id="app">
<div class='ideal-week-container'>

    <!-- <img src="http://coaches.test/wp-content/uploads/2020/04/ideal-week-title.png"/> -->
    <img src="https://coaches.smjcoachinginstitute.com/wp-content/uploads/2020/04/ideal-week-title.png"/>

    <table class="ideal-table">
    <thead>
        <tr>
        <th><span>Time</span></th>
        <th><span>Monday</span></th>
        <th><span>Tuesday</span></th>
        <th><span>Wednesday</span></th>
        <th><span>Thursday</span></th>
        <th><span>Friday</span></th>
        </tr>
    </thead>

    <!-- <tr v-for="item in time_sched">
        <td><p>{{item}}</p></td>
        <td><input type="text" v-bind:name="item + '[0]'" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
        <td><input type="text" v-bind:name="item + '[1]'" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
        <td><input type="text" v-bind:name="item + '[2]'" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
        <td><input type="text" v-bind:name="item + '[3]'" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
        <td><input type="text" v-bind:name="item + '[4]'" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
    </tr> -->
    <tbody>
        <tr v-for="(item, index) in time_sched" :key="item.time">
            <td><p>{{ item.time }}</p></td>
            <td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[0]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
            <td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[1]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
			<td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[2]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
			<td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[3]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
			<td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[4]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>			
        </tr>
    </tbody>
    
    </table>

    <!-- <input type="text" name='test' v-bind:value="test" v-model="test"> -->

    <!-- <p>{{message}}</p> -->
    <button v-on:click="reverseMessage" class="save-btn">Save My Ideal Week</button>
    
    
    <button id="print" style="margin: 8px;cursor: pointer;background-color: #009f3c;border: none;padding: 4px 24px;border-radius: 18px;color: white;font-size: 1.5rem;" >Print a Copy</button>
    </div>
</div>


<script>
    // const axios = require('axios')
var app = new Vue({
  el: '#app',
  data: {
      test:'asd',
    time: ['08:00 AM','08:30 AM', '09:00 AM','09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM','11:30 AM', '12:00 PM', '12:30 PM', '01:00 PM', '01:30 PM', '02:00 PM', '02:30 PM', '03:00 PM', '03:30 PM', '04:00 PM', '0430 PM',],
    time_sched: 
	[
		{time : '08:00 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		 {time : '08:30 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		 {time : '09:00 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		 {time : '09:30 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		 {time : '10:00 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		 {time : '10:30 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		 {time : '11:00 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		 {time : '11:30 AM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '12:00 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '12:30 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '01:00 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '01:30 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '02:00 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '02:30 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '03:00 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '03:30 PM' , task : ["" ,"" ,"" ,"" ,""]}  ,
		{time : '04:00 PM' , task : ["" ,"" ,"" ,"" ,""]} ,
		{time : '04:30 PM' , task : ["" ,"" ,"" ,"" ,""]}  
	
	] 
    
  },
  methods: {
    reverseMessage: function () {
        const url = `${polar_AjaxAdmin.ajaxurl}?action=save_ideal_week`
        // http://test-site.com/admin-ajax.php?action=save_ideal_week
        console.log(url);

        var testing = jQuery('.ideal-table tbody input');
        // console.log(testing.serializeArray());
        var serialData = testing.serializeArray();

        // this.$set(this.time_sched[0]['task'],0, "samooke" );

        console.log(this.time_sched);


        const passMe = this.time_sched;

		axios.post(url, Qs.stringify( {"action" : "save_ideal_week", data : passMe, "class": "week"} ))
        .then ((res)=> console.log (res))
        .catch ((error)=> console.log(error))

      
    }
  },
  mounted(){
    // console.log(idealweek.data);
    if(idealweek.data){
        this.time_sched = idealweek.data;
    }
  }
})



</script>





<script>

jQuery("#print").click(function(){
    window.scrollTo(0,0);
    CreatePDFfromHTML();
})

function CreatePDFfromHTML() {
    var HTML_Width = document.getElementsByClassName("ideal-table")[0].offsetWidth;
    var HTML_Height = document.getElementsByClassName("ideal-table")[0].offsetHeight;
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas(document.getElementsByClassName("ideal-table")[0]).then(function (canvas) {
        window.scrollTo(0, 0);
        var imgData = canvas.toDataURL("image/png",0.9);
        // console.log(imgData)
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'png', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'png', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Ideal_Week.pdf");
    });
}
</script>
