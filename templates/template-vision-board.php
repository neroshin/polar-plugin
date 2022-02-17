<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<?php
// wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
wp_enqueue_media();
?>

<style>

/* <!-- grid images -->
            <!-- <div>
                <label for="image_url">Image</label>
                <input type="text" name="image_url" id="image_url" class="regular-text">
                <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
            
            </div> --> */
.wrapper {
  display: grid;
  grid-template-columns: 1fr 1fr;
  margin-bottom: 38px;
}

@media screen and (min-width: 500px) {
  .wrapper {
    grid-template-columns: 1fr 1fr 1fr;
  }
}

@media screen and (min-width: 800px) {
  .wrapper {
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
  }
}

.letter {
  /* background-color: #0069b3; */
  display: flex;
  justify-content: center;
  align-items: center;
  /* padding: 20px; */
  font-size: 70px;
  cursor: pointer;
  transition: all .3s ease;
  height: 125px;
  width: 100%;
}
.thumbnail{
    /* background: url("http://coaches.test/wp-content/uploads/2020/04/wp1892105-kimi-no-na-wa-wallpapers.png") no-repeat center center fixed; */
  background-size: cover;
  height: 100%;
  overflow: hidden;
}

.vision-container{
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
.neophorm{
    box-shadow:  20px 20px 60px #d9d9d9, 
             -20px -20px 60px #ffffff;
}
.upload-btn{
    cursor:pointer;background-color:#009f3c; border:none; padding:24px 48px;box-shadow:  20px 20px 60px #d9d9d9,-20px -20px 60px #ffffff; border-radius: 18px;color:white;font-size:1.5rem;
}
.upload-btn:hover{
    background-color:#00af42;
}
</style>

<div id="vision" style="padding:24px;" class="vision-container">
    <div style="width: 100%; height: 42vh; display:flex; align-items:center; justify-content: center; margin-bottom: 12px;">
        <img v-bind:src="feature" class="neophorm" style="max-height: 100%; border-radius: 18px;">
    </div>

    <div class="wrapper" >
        <div class="letter " v-for="item in imagesURL">
        <img v-on:click="thumbNailFun(item)" v-bind:src="item" class="thumbnail ">
        <!-- <p style="font-size:4px;">{{item}}</p> -->
        </div>
        
    </div>

    
 
    <button v-on:click="uploadFun" type="button" class="upload-btn" >Upload Image</button>

</div>



<script>
var vision = new Vue({
    el: '#vision',
    data : {
        feature: '',
        imagesURL : [],
        holder : ''
    },
    methods:{
        uploadFun: function(){
            console.log('upload')

            var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
            }).open()
            .on('select', function(e){
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_image = image.state().get('selection').first();
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                // console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                // Let's assign the url value to the input field
                holdMe= uploaded_image.toJSON().url;
                jeez(holdMe);
            });
        },
        thumbNailFun: function(data){
            console.log(data);
            this.feature = data;
        }

    },
    mounted(){
        if(visionboard.data){
        this.imagesURL = visionboard.data;
        this.feature = visionboard.data[0];
    }
    }
});

function jeez(param){
// console.log(param);
// jQuery('#hole').val(param);
// console.log(jQuery('#hole').val());
// console.log(visionboard.data);
if(visionboard.data){
    visionboard.data.push(param);
    console.log(visionboard.data);
    jQuery.ajax({
        type: "POST",
        url: polar_AjaxAdmin.ajaxurl,
        data: {
          action: "submit_vision",
          data: visionboard.data,
          class: "vision",
        },
        success: function (data) {
        //   console.log('success? exissting');
        location.reload();
        }
      });
}else{
    var visionData = [`${param}`]
    // console.log(visionData);
    jQuery.ajax({
        type: "POST",
        url: polar_AjaxAdmin.ajaxurl,
        data: {
          action: "submit_vision",
          data: visionData,
          class: "vision",
        },
        success: function (data) {
            location.reload();
        }
      });
}


}

</script>


