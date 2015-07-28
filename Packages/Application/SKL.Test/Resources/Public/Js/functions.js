/**
 * Created by sengkimlong on 7/14/2015.
 */
jQuery(document).ready(function() {

    jQuery('.item').on("click",function(){

        for(var i=1;i<5;i++){
            $('#list-'+i).removeClass("active");
        }
        var id = this.id.split('-');

        $('#list-'+id[1]).addClass("active");

    });

    jQuery('.list').on("click", function() {
        $('#questionList').fadeIn("slow");
        $('#btn-group').slideDown("slow");
        $('#answerContainer').css("display","none");

        var id = this.id.split('-');
        selectId = id[1];

        console.log(selectId);

        if (selectId == 1) {
            $('#listTitle').html("Personal Information");
        }else if (selectId == 2) {
            $('#listTitle').html("Interest Information");
        }else if (selectId == 3) {
            $('#listTitle').html("Hobbies Information");
        }

        jQuery.ajax({
            type: "GET",
            url: "http://local.project.dev/_Resources/Static/Packages/SKL.Test/Js/form" + selectId + ".json",
            dataType: "text",
            success:function(res) {
                var data = JSON.parse(res);
                var result = "";
                for (var q in data) {
                    result +=
                        '<div class="col-md-6">' +
                            '<div class="list-group">' +
                                '<div class="list-group-item">' +
                                    '<h4 class="list-group-item-heading">' + data[q].question + '</h4>' +
                                    '<input type="text" id="answer-' + data[q].type + '-' + data[q].id + '" class="form-control" name="answer" placeholder="Input answer" required>' +
                                    '<p id="alert-' + data[q].type + '-' + data[q].id + '" style="color: red;visibility: hidden;">*Please input your answer...</p>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
                }
                jQuery('#questionList').html(result);
            },
            error:function(xhr,ajaxOptions,thrownError) {
                alert(thrownError);
            }
        });

    });

    $('button[name="Submit"]').on("click", function () {
        $('#answerContainer').slideDown("slow");

        jQuery.ajax({
            type: "GET",
            url: "http://local.project.dev/_Resources/Static/Packages/SKL.Test/Js/form" + selectId + ".json",
            dataType: "text",
            success: function (res) {
            	var numberOfQuestion=0;
            	var fillValidated=0;
                var data = JSON.parse(res);
                var result = "<h2>Your Answer here: </h2";
                for (var q in data) {
                	numberOfQuestion+=1;
                    if ($('#answer-' + data[q].type + '-' + data[q].id).val() === "") {
                        $('#alert-' + data[q].type + '-' +data[q].id).css("visibility","visible");


                    }
                    else{
                        console.log("Hello");
                        $('#alert-' + data[q].type + '-' +data[q].id).css("visibility","hidden");
                        result +=
                            '<tr>' +
                            '<td>' + data[q].label + '</td>' +
                            '<td>' + $('#answer-' + data[q].type + '-' + data[q].id).val() + '</td>' +
                            '</tr>';
                        fillValidated+=1;
                    }

                }
                if (fillValidated == numberOfQuestion ) {
                    jQuery('#answerContainer').html(result);
                    jQuery('#answerContainer').css("visibility","visible");
                    jQuery('#scrolldown').click();
                    jQuery('#scrollup').css("visibility","visible");
                }
                else{
                	jQuery('#answerContainer').css("visibility","hidden");
                    jQuery('#scrollup').click();
                    jQuery('#scrollup').css("visibility","hidden");

                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }

        });

    });

    $('button[name="Cancel"]').on("click", function () {

        $('#answerContainer').fadeOut("slow");

        jQuery.ajax({
            type: "GET",
            url: "http://local.project.dev/_Resources/Static/Packages/SKL.Test/Js/form" + selectId + ".json",
            dataType: "text",
            success: function (res) {
                var data = JSON.parse(res);
                var result = "";
                for (var q in data) {
                    $('#answer-' + data[q].type + '-' + data[q].id).val("");
					$('#alert-' + data[q].type + '-' + data[q].id).css("visibility","hidden");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }

        });

    });

	$('#btn-frm1').on("click",function(){
		$('#form-1').click();
	});


    var count = 1;
    var track = 0;
    jQuery.ajax({
        type: "GET",
        url: "http://local.project.dev/_Resources/Static/Packages/SKL.Test/Js/homepagecontent.json",
        dataType: "text",
        success:function(res) {
            var data = JSON.parse(res);
            for (var q in data) {
                track++;
            }
            $('.jumbotron h1').html(data["page"+count].title);
            $('#content').html(data["page"+count].content);
            $('#next').on("click",function() {
                count++;
                if (count === track) {
                    $('.jumbotron h1').html(data["page"+count].title);
                    $('#content').html(data["page"+count].content);
                    $('#next').html("Back to Start");
                    $('#next').css("visibility","hidden");
					          $('#btn-frm1').css("visibility","visible");
                    count = 0;
                }else {
                    $('.jumbotron h1').html(data["page"+count].title);
                    $('#content').html(data["page"+count].content);
                    $('#next').html("Next")
					          $('#btn-frm1').css("visibility","hidden");
                }
            });


        },
        error:function(xhr,ajaxOptions,thrownError) {
            alert(thrownError);
        }
    });








});
