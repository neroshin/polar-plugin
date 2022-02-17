<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<style>
#polar-print{
    font-size: 22px;
    background-color: #b38544;
    border-width: 3px!important;
    border-color: #e9c57b;
    border-radius: 15px;
    font-weight: 600;
    font-style: normal;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 1px;
    cursor: pointer;
    color: white;
    padding: 4px 12px;
}
</style>

<button id="polar-print">Print</button>



<script>

jQuery("#polar-print").click(function(){
    window.scrollTo(0,0);


    var collapsy = document.getElementsByClassName('collapse');
    for(i = 0; i < collapsy.length; i++){
        const el = collapsy[i];
        // console.log(el.classList);
        if(el.classList.contains('show')){

        }else{
            el.classList.add('show');
        }
    }

    $('.btn').hide();

    CreatePDFfromHTML();
})

function CreatePDFfromHTML() {
    var HTML_Width = document.getElementsByClassName('et_pb_row et_pb_row_1')[0].offsetWidth;
    var HTML_Height = document.getElementsByClassName('et_pb_row et_pb_row_1')[0].offsetHeight;
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas(document.getElementsByClassName('et_pb_row et_pb_row_1')[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        console.log(imgData)
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Dashboard.pdf");
    });
}
</script>