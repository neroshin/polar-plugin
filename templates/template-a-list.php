
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/qs/dist/qs.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<style>

#a-list{
 background-color:#ffffff;
 border-radius: 18px;
 padding: 16px;
 display:flex;
 flex-flow:column;
 justify-content:center;
 align-items:center;
 box-shadow:  20px 20px 60px #d9d9d9, 
             -20px -20px 60px #ffffff;
margin-bottom:48px;

}

#strat-list{
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

.a-list-inputs{
    width: 100%;
    font-size: 24px;
    text-align: center;
    border-top: none !important;
    border-left: none !important;
    border-right: none !important;
    border-bottom: 2px solid gray !important;
    margin-bottom: 24px !important;
}

</style>


<div id="list">
    <div id="a-list">

        <h1>A-LIST</h1>
        
        <!-- <input type="text" class="a-list-inputs" v-model="aList[0]" /> -->

        <input type="text" v-for="(item,index) in aList"  class="a-list-inputs"  v-model="item.input" />
        <button class="btn btn-success" style="width:100%" v-on:click="saveAList">Save List</button>
        <button id="print-a-list" class="btn btn-outline-success" style="margin:8px; width:100%;">Print a Copy</button>
    </div>


    <div id="strat-list">
        <h1>STRATEGIC ALLIANCE LIST</h1>
    
    <!-- <input type="text" class="a-list-inputs" v-model="aList[0]" /> -->

        <input type="text" v-for="(item,index) in stratList"  class="a-list-inputs"  v-model="item.input" />
        <button class="btn btn-success" style="width:100%" v-on:click="saveAList">Save List</button>
        <button id="print-strat-list"  class="btn btn-outline-success" style="margin:8px; width:100%;">Print a Copy</button>
    </div>

</div>

<script>



var aList = new Vue({
    el : '#list',
    data:{
        aList : [
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
        ],
        stratList : [
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
            {input: ''},
        ]
    },
    methods : {
        saveAList : function(){
            const aList = this.aList;
            const stratList = this.stratList;
            const passMe = {aList, stratList}
            console.log(passMe);

            const url = `${polar_AjaxAdmin.ajaxurl}?action=save_list`
            axios.post(url, Qs.stringify( {"action" : "save_list", data : passMe, "class": "list"} ))
            .then ((res)=> console.log (res))
            .catch ((error)=> console.log(error))

        }
    },
    mounted() {
        if(alist.data){
            this.aList = alist.data.aList;
            this.stratList = alist.data.stratList;
        }
    }
})

// var stratList = new Vue({
//     el: '#strat-list',
//     data: {
//         stratList : [
//             {input: ''},
//             {input: ''},
//             {input: ''},
//             {input: ''},
//             {input: ''},
//             {input: ''},
//             {input: ''},
//             {input: ''},
//             {input: ''},
//             {input: ''},
//         ]
//     }
// })


</script>


<script>

jQuery("#print-a-list").click(function(){
    window.scrollTo(0,0);
    jQuery('.btn').hide();
    if(window.pageYOffset === 0){
        CreatePDFfromHTMLa();
    }
})

function CreatePDFfromHTMLa() {
    var HTML_Width = document.getElementById("a-list").offsetWidth;
    var HTML_Height = document.getElementById("a-list").offsetHeight;
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas(document.getElementById("a-list")).then(function (canvas) {
        window.scrollTo(0, 0);
        var imgData = canvas.toDataURL("image/png",0.9);
        // console.log(imgData)
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'png', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'png', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("A-List.pdf");
        jQuery(".btn").show();
    });
}
</script>



<script>

jQuery("#print-strat-list").click(function(){
    window.scrollTo(0,0);
    jQuery('.btn').hide();
    if(window.pageYOffset === 0){
        CreatePDFfromHTMLb();
    }
})

function CreatePDFfromHTMLb() {
    var HTML_Width = document.getElementById("strat-list").offsetWidth;
    var HTML_Height = document.getElementById("strat-list").offsetHeight;
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas(document.getElementById("strat-list")).then(function (canvas) {
        window.scrollTo(0, 0);
        var imgData = canvas.toDataURL("image/png",0.9);
        // console.log(imgData)
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'png', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'png', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Strategic_Alliance_List.pdf");
        jQuery(".btn").show();
    });
}
</script>


