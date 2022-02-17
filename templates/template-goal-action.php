
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/qs/dist/qs.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<style>


#goal-action{
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


.action-table th{
    border: 1px solid #000000 !important;
    text-align:center;
    padding: 0px !important;
    background-color: #dab05e;
}
.action-table tbody td{
    border: 1px solid #000000 !important;
     padding: 0px !important;
    text-align:center;
}
.action-table tbody td p{
    font-size: 12px;
}
.action-table tbody tr:nth-child(even){
    background-color:#ececec;
}
.action-table tbody tr:nth-child(7n+1){
    background-color:#ffffcc;
}
.cell-input{
    width: 100%;
    height: 100%;
    font-size: 18px;
    border-top: 0px !important;
    border-left: 0px !important;
    border-right: 0px !important;
}

</style>



<div id="goal-action">
    <h1>ACTIONS</h1>
    <table class="action-table">
    <thead>
        <tr>
            <th><span> </span></th>
            <th style="width: 50%;"><span>Goals And Actions</span></th>
            <th><span>1<sup>st</sup> 30 Days Completed</span></th>
            <th><span>60 Days Completed</span></th>
            <th><span>90 Days Completed</span></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(item, index) in time_sched" :key="item.time">
            <td style="width: 5%;"><p>{{ item.abre }}</p></td>
            <td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[0]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
            <td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[1]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
			<td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[2]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
			<td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[3]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>
			<!-- <td><input type="text" v-bind:name=" 'item[task][' + index + '][0]'"  v-model="item.task[4]" class="cell-input" style="background:rgba(255, 255, 255, .4)"></td>			 -->
        </tr>
    </tbody>
</table>
    <button id="print-goal-actions" style="margin: 8px;cursor: pointer;background-color: #009f3c;border: none;padding: 4px 24px;border-radius: 18px;color: white;font-size: 1.5rem;" >Print a Copy</button>
</div>

<script>

var goalAction = new Vue({
    el: "#goal-action",
    data:{
        time_sched: 
            [
                {abre : "G1" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A1" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A2" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A3" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A4" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A5" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "G2" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A1" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A2" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A3" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A4" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A5" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "G3" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A1" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A2" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A3" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A4" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A5" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "G4" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A1" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A2" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A3" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A4" , task : ["" ,"" ,"" ,"" ,""]}  ,
                {abre : "A5" , task : ["" ,"" ,"" ,"" ,""]}  ,
            
            ] 
    }
})

</script>


<script>

jQuery("#print-goal-actions").click(function(){
    window.scrollTo(0,0);
    jQuery('#print-goal-actions').hide();
    CreatePDFfromHTML();
})

function CreatePDFfromHTML() {
    var HTML_Width = document.getElementById("goal-action").offsetWidth;
    var HTML_Height = document.getElementById("goal-action").offsetHeight;
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas(document.getElementById("goal-action")).then(function (canvas) {
        window.scrollTo(0, 0);
        var imgData = canvas.toDataURL("image/png",0.9);
        // console.log(imgData)
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'png', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'png', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Goal_Actions.pdf");
        jQuery("#print-goal-actions").show();
    });
}
</script>
