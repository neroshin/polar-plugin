jQuery(document).ready(function () {
  /* 		
jQuery.each(life.data , function(key , value){
		$rowid = key;
		$style = jQuery("table#empTable tbody input[type='button'][index='"+$rowid+"']").attr("style");
		$name = jQuery("table#empTable tbody input.label[index='"+$rowid+"']").val();

		jQuery("div#things-todo #life-things-todo").append('<ul id="life-id-'+$rowid+'" class="things-todo" index="'+$rowid+'" data-wheel="life"><li style="'+$style+'">'+$name+'</li><li><input name="label1" value=""></li><li><input name="label2" value=""></li><li><input name="label3" value=""></li><li><input name="label4" value=""></li><li><input name="label5" value=""></li></ul>');
})
	 */

  /* jQuery.each(life.things_todo, function (key, value) {
    $rowid = key;
    $style = jQuery(
      "table#empTable tbody input[type='button'][index='" + $rowid + "']"
    ).attr("style");
    $name = jQuery(
      "table#empTable tbody input.label[index='" + $rowid + "']"
    ).val();
    $color = "color:" + $style.substr(18);

    // modify renderer
    jQuery("div.things-todo #life-things-todo").append(
      '<ol id="life-id-' +
      $rowid +
      '" class="things-todo" index="' +
      $rowid +
      '" data-wheel="life"><h4 style="' +
      $style +
      '; border-radius:8px;" class="todo-title text-center">' +
      $name +
      '</h4><li style="' + $color + '"><input class="form-control" style="width:350px; name="todo[' +
      $rowid +
      '][0]" value="' +
      value[0] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px; name="todo[' +
      $rowid +
      '][1]" value="' +
      value[1] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px; name="todo[' +
      $rowid +
      '][2]" value="' +
      value[2] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px; name="todo[' +
      $rowid +
      '][3]" value="' +
      value[3] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px; name="todo[' +
      $rowid +
      '][4]" value="' +
      value[4] +
      '"></li></ol>'
    );
  });

  jQuery.each(business.things_todo, function (key, value) {
    $rowid = key;
    $style = jQuery(
      "table#empTable2 tbody input[type='button'][index='" + $rowid + "']"
    ).attr("style");
    $name = jQuery(
      "table#empTable2 tbody input.label[index='" + $rowid + "']"
    ).val();
    // console.log($style.substr(18));
    $color = "color:" + $style.substr(18);
    // modify renderer
    // jQuery("div.things-todo #business-things-todo").append(
    //   '<ul id="business-id-' + $rowid + '" class="things-todo " index="' + $rowid + '" data-wheel="business"><h4 style="' + $style + '" class="todo-title">"' + $name + '"</h4><li><span>1</span><input name="todo[' + $rowid + '][0]" value=""></li><li><span>1</span><input name="todo[' + $rowid + '][1]" value=""></li><li><span>1</span><input name="todo[' + $rowid + '][2]" value=""></li><li><span>1</span><input name="todo[' + $rowid + '][3]" value=""></li><li><span>1</span><input name="todo[' + $rowid + '][4]" value=""></li></ul>'
    // );
     jQuery("div.things-todo #business-things-todo").append(
      '<ol id="buseness-id-' +
      $rowid +
      '" class="things-todo numOl" index="' +
      $rowid +
      '" data-wheel="business"><h4 style="' +
      $style +
      '; border-radius:8px;" class="todo-title text-center">' +
      $name +
      '</h4><li style="' + $color + '"><input class="form-control" style="width:350px;" name="todo[' +
      $rowid +
      '][0]" value="' +
      value[0] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px;" name="todo[' +
      $rowid +
      '][1]" value="' +
      value[1] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px;" name="todo[' +
      $rowid +
      '][2]" value="' +
      value[2] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px;" name="todo[' +
      $rowid +
      '][3]" value="' +
      value[3] +
      '"></li><li style="' + $color + '"><input class="form-control" style="width:350px;" name="todo[' +
      $rowid +
      '][4]" value="' +
      value[4] +
      '"></li></ol>'
    ); 
  });
 */

  jQuery('.business-save').click(function () {
    business["things_todo"] = jQuery(
      "div.things-todo #business-things-todo input"
    ).serializeArray();

    var index = jQuery(this)
      .parents(".things-todo")
      .attr("index");
    console.log(index);

    var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
    var backgroundColorSerialized = JSON.stringify(
      config2.data.datasets[0].backgroundColor
    );
    var labelsSerialized = JSON.stringify(config2.data.labels);

    var dataExtracted = JSON.parse(dataSerialized);
    var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
    var labelsExtracted = JSON.parse(labelsSerialized);

    console.log(config2.data.datasets[0].data.length);
    jQuery.ajax({
      type: "POST",
      url: polar_AjaxAdmin.ajaxurl,
      data: {
        action: "save_data_polar",
        data: dataExtracted,
        backgroundColor: backgroundColorExtracted,
        labels: labelsExtracted,
        selectedData: index,
        class: "business",
        things_todo: business["things_todo"]
      },
      success: function (data) {
        console.log(data);
        console.log('saved from button');
      }
    });
  })

  jQuery('.life-save').click(function () {
    life["things_todo"] = jQuery(
      "div.things-todo #life-things-todo input"
    ).serializeArray();

    var index = jQuery(this)
      .parents(".things-todo")
      .attr("index");
    console.log(index);

    var dataSerialized = JSON.stringify(config1.data.datasets[0].data);
    var backgroundColorSerialized = JSON.stringify(
      config1.data.datasets[0].backgroundColor
    );
    var labelsSerialized = JSON.stringify(config1.data.labels);

    var dataExtracted = JSON.parse(dataSerialized);
    var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
    var labelsExtracted = JSON.parse(labelsSerialized);



    console.log(test);

    console.log(config1.data.datasets[0].data.length);
    console.log("sample");
    jQuery.ajax({
      type: "POST",
      url: polar_AjaxAdmin.ajaxurl,
      data: {
        action: "save_data_polar",
        data: dataExtracted,
        backgroundColor: backgroundColorExtracted,
        labels: labelsExtracted,
        selectedData: index,
        class: "life",
        things_todo: life["things_todo"]
      },
      success: function (data) {
        console.log(data);
      }
    });
  })

  jQuery("body").on(
    "change",
    // "div#business-things-todo .things-todo input",
    "div.things-todo #business-things-todo input",
    function () {
      business["things_todo"] = jQuery(
        "div.things-todo #business-things-todo input"
      ).serializeArray();

      var index = jQuery(this)
        .parents(".things-todo")
        .attr("index");
      console.log(index);

      var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
      var backgroundColorSerialized = JSON.stringify(
        config2.data.datasets[0].backgroundColor
      );
      var labelsSerialized = JSON.stringify(config2.data.labels);

      var dataExtracted = JSON.parse(dataSerialized);
      var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
      var labelsExtracted = JSON.parse(labelsSerialized);

      console.log(config2.data.datasets[0].data.length);
      jQuery.ajax({
        type: "POST",
        url: polar_AjaxAdmin.ajaxurl,
        data: {
          action: "save_data_polar",
          data: dataExtracted,
          backgroundColor: backgroundColorExtracted,
          labels: labelsExtracted,
          selectedData: index,
          class: "business",
          things_todo: business["things_todo"]
        },
        success: function (data) {
          console.log(data);
        }
      });
    }
  );

  jQuery("body").on(
    "change",
    "div.things-todo #life-things-todo input",
    function () {
      // jQuery("div#life-things-todo .things-todo input").change(function(){

      life["things_todo"] = jQuery(
        "div.things-todo #life-things-todo input"
      ).serializeArray();

      var index = jQuery(this)
        .parents(".things-todo")
        .attr("index");
      console.log(index);

      var dataSerialized = JSON.stringify(config1.data.datasets[0].data);
      var backgroundColorSerialized = JSON.stringify(
        config1.data.datasets[0].backgroundColor
      );
      var labelsSerialized = JSON.stringify(config1.data.labels);

      var dataExtracted = JSON.parse(dataSerialized);
      var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
      var labelsExtracted = JSON.parse(labelsSerialized);

      console.log(config1.data.datasets[0].data.length);
      console.log("sample");
      jQuery.ajax({
        type: "POST",
        url: polar_AjaxAdmin.ajaxurl,
        data: {
          action: "save_data_polar",
          data: dataExtracted,
          backgroundColor: backgroundColorExtracted,
          labels: labelsExtracted,
          selectedData: index,
          class: "life",
          things_todo: life["things_todo"]
        },
        success: function (data) {
          console.log(data);
        }
      });
    }
  );

  // jQuery("body").on(
  //   "change",
  //   "div.things-todo #business-things-todo input",
  //   function () {
  //     // jQuery("div#life-things-todo .things-todo input").change(function(){

  //     business["things_todo"] = jQuery(
  //       "div.things-todo #business-things-todo input"
  //     ).serializeArray();

  //     var index = jQuery(this)
  //       .parents(".things-todo")
  //       .attr("index");
  //     console.log(index);

  //     var dataSerialized = JSON.stringify(config2.data.datasets[0].data);
  //     var backgroundColorSerialized = JSON.stringify(
  //       config2.data.datasets[0].backgroundColor
  //     );
  //     var labelsSerialized = JSON.stringify(config2.data.labels);

  //     var dataExtracted = JSON.parse(dataSerialized);
  //     var backgroundColorExtracted = JSON.parse(backgroundColorSerialized);
  //     var labelsExtracted = JSON.parse(labelsSerialized);

  //     console.log(config2.data.datasets[0].data.length);
  //     console.log("business");
  //     jQuery.ajax({
  //       type: "POST",
  //       url: polar_AjaxAdmin.ajaxurl,
  //       data: {
  //         action: "save_data_polar",
  //         data: dataExtracted,
  //         backgroundColor: backgroundColorExtracted,
  //         labels: labelsExtracted,
  //         selectedData: index,
  //         class: "business",
  //         things_todo: business["things_todo"]
  //       },
  //       success: function (data) {
  //         console.log(data);
  //       }
  //     });
  //   }
  // );
});
