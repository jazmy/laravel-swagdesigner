//------------------------------
//
//  Jasmine Robinson
//  DGMD E-12 (24790)
//  Assignment 4 - Final Project
//  Due: 5/8/2017
//
//------------------------------

//----------------------------------------------------------------------
//  Declare my Variables
//----------------------------------------------------------------------
var canvas, design_value, fullname, message,x,y,resizefactor, select;
design_value = "";
fullname = "";
message = "";
itemtype = "";
x=0;
y=0;
resizefactor = 2.5;
select="";
purchaselink ="";
template="";
line1 = "";
line2= "";
line3= "";
toptext="";
bottomtext="";
r = 70;

//----------------------------------------------------------------------
//  Preloading my font
//----------------------------------------------------------------------
function preload() {
  font = loadFont('/assets/balloon-bd-bt-bold.ttf');
}
//----------------------------------------------------------------------
//  Declare my Canvas and attach to the canvas div tag on my html
//----------------------------------------------------------------------
function setup() {
  canvas = createCanvas(400, 400);
  canvas.parent("canvas-container");
  background(51);
  fill(255);
  browserwidth = windowWidth;
  //----------------------------------------------------------------------
  //  load all my images to be used as backgrounds later
  //--------------------------------------------------------------------
  backgroundimg = loadImage("/img/swag/background.jpg");
  tshirtimg= loadImage("/img/swag/tshirt.jpg");
  mugimg= loadImage("/img/swag/mug.jpg");
  pinbuttonimg= loadImage("/img/swag/pinbutton.jpg");
  thumblftimg= loadImage("/img/swag/thisguy_left_sm.png");
  thumbrtimg= loadImage("/img/swag/thisguy_right_sm.png");
  hellostickerimg= loadImage("/img/swag/hello_sticker_sm.png");
  likeabossimg= loadImage("/img/swag/likeaboss_sm.png");
  allthethingsimg= loadImage("/img/swag/allthethings_sm.png");
  kissimg= loadImage("/img/swag/kissme_sm.png");
  heroimg= loadImage("/img/swag/superhero_sm.png");

  //----------------------------------------------------------------------
  //  Add the Save Image Function to the Update Button using JQuery
  //--------------------------------------------------------------------
  $("#actionbutton").click(function() {
    saveImage();
  });


  //----------------------------------------------------------------------
  //  Create the Dom "Buy Now" button that links to the Zazzle API
  //--------------------------------------------------------------------
  fill(254,209,54);
  buynowbutton = createButton('Buy Now');
  buynowbutton.parent("buynowbutton");
  buynowbutton.mousePressed(BuyNow);
  buynowbutton.class('btn btn-xl');

  //----------------------------------------------------------------------
  //  Create the Dom "Save Image" button
  //--------------------------------------------------------------------
  fill(254,209,54);
  //saveimgbutton = createButton('Save Image');
  //  saveimgbutton.position(400,100);
  //saveimgbutton.parent("saveimgbutton");
  //saveimgbutton.mousePressed(saveImage);
  //saveimgbutton.class('btn btn-xl');

  //----------------------------------------------------------------------
  //  Grab the form field values
  //--------------------------------------------------------------------
  template = document.getElementById("template").value;
  line1 = document.getElementById("line1").value;
  line2 = document.getElementById("line2").value;
  if (document.getElementById("line3") !=null) {
    line3 = document.getElementById("line3").value;
  } else {
    line3 = "";
  }

  if (document.getElementById("template") !=null) {
    template = document.getElementById("template").value;
  } else {
    template = "";
  }

  //----------------------------------------------------------------------
  //  Dynamically Generate the form fields & Text Needed for Each Template and store values in Hidden Field
  //----------------------------------------------------------------------

  //----------------------------------------------------------------------
  //  Template: hello
  //----------------------------------------------------------------------
  if (template == "hello"){
    toptext = createDiv(line1 + " " + line2);
    toptext.parent("toptext");

    helloinp1 = createInput();
    helloinp1.class("form-control");
    helloinp1.parent("dynamicfields");
    helloinp1.value(line3);
    helloinp1.attribute("required","");
    helloinp1.input(updateline3);

  }

  //----------------------------------------------------------------------
  //  Template: Thumbs
  //----------------------------------------------------------------------
  if (template == "thumbs") {
    toptext = createDiv("This");
    toptext.parent("toptext");
    //let's remove "this" from the text box so it can be the heading
    thumbsline1 = line1.replace("This", "");

    thumbsimp1 = createInput();
    thumbsimp1.class("form-control");
    thumbsimp1.value(thumbsline1);
    thumbsimp1.parent("dynamicfields");
    thumbsimp1.attribute("required","");
    thumbsimp1.input(updatethumbsline1);


    thumbsimp2 = createInput();
    thumbsimp2.class("form-control");
    thumbsimp2.value(line2);
    thumbsimp2.parent("dynamicfields");
    thumbsimp2.attribute("required","");
    thumbsimp2.input(updateline2);

    thumbsimp3 = createInput();
    thumbsimp3.class("form-control");
    thumbsimp3.value(line3);
    thumbsimp3.parent("dynamicfields");
    thumbsimp3.attribute("required","");
    thumbsimp3.input(updateline3);
  }
  //----------------------------------------------------------------------
  //  Template: hero
  //----------------------------------------------------------------------
  if (template == "hero") {

    toptext = createDiv(line1);
    toptext.parent("toptext");

    heroimp1 = createInput();
    heroimp1.class("form-control");
    heroimp1.value(line2);
    heroimp1.parent("dynamicfields");
    heroimp1.attribute("required","");
    heroimp1.input(updateline2);

    bottomtext = createDiv(line3);
    bottomtext.parent("bottomtext");
  }
  //----------------------------------------------------------------------
  //  Template: boss
  //----------------------------------------------------------------------
  if (template == "boss") {

    bossimp1 = createInput();
    bossimp1.class("form-control");
    bossimp1.value(line1);
    bossimp1.parent("dynamicfields");
    bossimp1.attribute("required","");
    bossimp1.input(updateline1);

    bottomtext = createDiv(line2);
    bottomtext.parent("bottomtext");
  }

  //----------------------------------------------------------------------
  //  Template: kiss
  //----------------------------------------------------------------------
  if (template == "kiss") {

    toptext = createDiv(line1);
    toptext.parent("toptext");

    kissimp1 = createInput();
    kissimp1.class("form-control");
    kissimp1.value(line2);
    kissimp1.parent("dynamicfields");
    kissimp1.attribute("required","");
    kissimp1.input(updateline2);

    kissimp2 = createInput();
    kissimp2.class("form-control");
    kissimp2.value(line3);
    kissimp2.parent("dynamicfields");
    kissimp2.attribute("required","");
    kissimp2.input(updateline3);
  }

  //----------------------------------------------------------------------
  //  Template: All the Things
  //----------------------------------------------------------------------
  if (template == "allthethings") {

    allthethingsimp1 = createInput();
    allthethingsimp1.class("form-control");
    allthethingsimp1.value(line1);
    allthethingsimp1.parent("dynamicfields");
    allthethingsimp1.attribute("required","");
    allthethingsimp1.input(updateline1);

    //let's remove "this" from the text box so it can be the heading
    allthethings2 = line2.replace("All the", "");
    midtext = createDiv("All the");
    midtext.parent("dynamicfields");

    allthethingsimp2 = createInput();
    allthethingsimp2.class("form-control");
    allthethingsimp2.value(allthethings2);
    allthethingsimp2.parent("dynamicfields");
    allthethingsimp2.attribute("required","");
    allthethingsimp2.input(updateallthethingsline3);
  }

}

//----------------------------------------------------------------------
//  Draw the Product Item Preview and have it dynamically update the text
//----------------------------------------------------------------------
function draw() {
  //set the background as wood panels
  background(backgroundimg);
  writeonitem("tshirt",line1,line2,line3,template);
}

//----------------------------------------------------------------------
//  Function to display the text on the item
//----------------------------------------------------------------------
function writeonitem(itemtype,line1,line2,line3,template) {

  fill(0);
  textStyle(BOLD);
  textAlign(CENTER);

  //----------------------------------------------------------------------
  //  Setting it up so int he future I may have other items (mug, buttons)
  //----------------------------------------------------------------------
  if (itemtype == "tshirt") {
    background(tshirtimg);

    //----------------------------------------------------------------------
    // Template: Thumbs
    //----------------------------------------------------------------------
    if (template == "thumbs") {
      textFont(font);
      textSize(22)
      text(line2, 205, 190);

      textSize(24)
      text(line3, 200, 245);

      textSize(32)

      //Trying to Arc the text
      push();
      DrawArcText(line1)
      pop();
      translate(0,0);
      image(thumblftimg,110,155,thumblftimg.width/12, thumblftimg.height/12);
      image(thumbrtimg,235,155,thumbrtimg.width/12, thumbrtimg.height/12);

      purchaselink = "https://www.zazzle.com/api/create/at-238647733918273652?rf=238647733918273652&ax=Linkover&pd=235327728870980455&ed=true&tc=&ic=&t_line1_txt=" +  line1 + "&t_line2_txt=" + line2 + "&t_line3_txt=" + line3;

    }
    //----------------------------------------------------------------------
    //  Template: Hello, My Name is: _______________
    //----------------------------------------------------------------------
    else if (template == "hello"){

      image(hellostickerimg,225,115,hellostickerimg.width/12, hellostickerimg.height/12);
      textFont(font);

      fill(255);
      textSize(12)
      text(line1, 260, 127);

      textSize(4)
      text(line2, 260,131);

      fill(0);
      textSize(12)
      text(line3, width/2 + 25, height/2 - 62, 65, 50);

      purchaselink = "https://www.zazzle.com/api/create/at-238647733918273652?rf=238647733918273652&ax=Linkover&pd=235622755378496692&ed=true&tc=&ic=&t_line1_txt=" +  line1 + "&t_line2_txt=" + line2 + "&t_line3_txt=" + line3;
    }
    //----------------------------------------------------------------------
    // Template: Like a Boss
    //----------------------------------------------------------------------
    else if (template == "boss"){
      image(likeabossimg,120,125,likeabossimg.width/10, likeabossimg.height/10);
      textFont(font);
      textSize(22)
      text(line1, width/2 - 10, 140, 120, 100);

      textSize(28)
      text(line2, 205, 230);

      purchaselink = "https://www.zazzle.com/api/create/at-238647733918273652?rf=238647733918273652&ax=Linkover&pd=235578906091962973&ed=true&tc=&ic=&t_line1_txt=" +  line1 + "&t_line2_txt=" + line2;

    }

    //----------------------------------------------------------------------
    // Template: Have no Fear  ________ is here
    //----------------------------------------------------------------------
    else if (template == "hero"){
      image(heroimg,120,125,likeabossimg.width/10, likeabossimg.height/10);
      textFont(font);
      textSize(26)
      text(line1, width/2, 120);
      textAlign(LEFT);
      textSize(24)
      text(line2, width/2 + 10, 130, 100, 100);
      textAlign(CENTER);
      textSize(24)
      text(line3, 200, 215);
      purchaselink = "https://www.zazzle.com/api/create/at-238647733918273652?rf=238647733918273652&ax=Linkover&pd=235340419472386585&ed=true&tc=&ic=&t_line1_txt=" +  line1 + "&t_line2_txt=" + line2 + "&t_line3_txt=" + line3;

    }

    //----------------------------------------------------------------------
    // Template: All the Things
    //----------------------------------------------------------------------
    else if (template == "allthethings"){
      image(allthethingsimg,140, 120,allthethingsimg.width/6, allthethingsimg.height/6);
      textFont(font);
      textSize(24)
      text(line1, width/2, 110);

      textSize(22)
      text(line2, 210, 230);

      //    textSize(24)
      //  text(line3, 200, 245);
      purchaselink = "https://www.zazzle.com/api/create/at-238647733918273652?rf=238647733918273652&ax=Linkover&pd=235984344474943475&ed=true&tc=&ic=&t_line1_txt=" +  line1 + "&t_line2_txt=" + line2;

    }
    //----------------------------------------------------------------------
    // Template: Kiss me It's my ________
    //----------------------------------------------------------------------
    else if (template == "kiss"){
      image(kissimg,110,95,kissimg.width/10, kissimg.height/10);
      textFont(font);
      textSize(36)
      text(line1, width/2 - 20, 110, 120, 100);

      textSize(22)
      text(line2, 220, 170);

      textSize(28)
      text(line3, width/2+10, 205);
      purchaselink = "https://www.zazzle.com/api/create/at-238647733918273652?rf=238647733918273652&ax=Linkover&pd=235325168780900288&ed=true&tc=&ic=&t_line1_txt=" + line1 + "&t_line2_txt=" + line2 + "&t_text3_txt=" + line3;

    }
    //----------------------------------------------------------------------
    // Template: Unknown
    //----------------------------------------------------------------------
    else {
      textFont(font);
      textSize(32)
      text(line1, 200, 120);

      textSize(22)
      text(line2, 205, 190);

      textSize(24)
      text(line3, 200, 245);

    }
  }

}

function DrawArcText(linetext) {
//Note: This code was modified and converted from processing to p5js: https://www.openprocessing.org/sketch/129166

  // move the origin to the center of the canvas
  translate(width/2, height/2);

  // current distance around the circle
  arcLength = 0;

  // total number of radians that the text will consume
  totalAngle = textWidth(linetext) / r;

  // iterate over each individual character in the String
  for (i = 0; i < linetext.length;i++) {
    // charAt(i) gets the character at position i in the String
    currentChar = linetext.charAt(i);
    w = textWidth(currentChar);
    // since the letters are drawn centered, we advance by half a letter width
    arcLength += w/2;

    // use a some trig to find the angle matching this arclength
    // the totalAngle/2 just adds some additional rotation so the
    // text starts wraps evenly around the circle
    theta = (arcLength / r - totalAngle/2);

    // save our current origin
    push();
    // rotate to line up with the orientation of the letter
    rotate(theta);
    // translate out along the radius to where the letter will be drawn
    translate(0, -r);

    // draw the character
    text(currentChar, 0, 0);
    // pop back to our origin in the middle of the circle
    // (undoing the rotate and translate)
    pop();
    // add the other half of the character width to our current position
    arcLength += w/2;
  }
}


//----------------------------------------------------------------------
//  Function triggered by the Buy Now Mouse Press that will redirect
//  the user to puchase their creation on Zazzle
//----------------------------------------------------------------------
function BuyNow()  {
  window.open(purchaselink,'_blank');
}

//----------------------------------------------------------------------
//  Update the hidden field in the form with the values of the dynamically generated field
//----------------------------------------------------------------------
function updateline1() {
  line1 = this.value();
  $("#line1").val(line1);
}

function updateline2() {
  line2 = this.value();
  $("#line2").val(line2);
}

function updateline3() {
  line3 = this.value();
  $("#line3").val(line3);
}

function updatethumbsline1() {
  line1 = "This " + this.value();
  $("#line1").val(line1);
}

function updateallthethingsline3() {
  line2 = "All the " + this.value();
  $("#line2").val(line2);
}

//----------------------------------------------------------------------
//  Generate a Random string we will use for the image filename
//----------------------------------------------------------------------
function createRandomString( length ) {

    var str = "";
    for ( ; str.length < length; str += Math.random().toString( 36 ).substr( 2 ) );
    return str.substr( 0, length );
}


//----------------------------------------------------------------------
//  Saving my Canvas to an image on the user's computer
//----------------------------------------------------------------------


function saveImage() {
 //save('mytshirt.jpg');

filename = document.getElementById('p5jsimg').value;
//  alert("test filename1:" + filename);
if (filename == '') {
  filename = createRandomString( 16 ) + ".jpg";
  $("#p5jsimg").val(filename);
} else {
    $("#p5jsimg").val(filename);
}

//filename = createRandomString( 16 ) + ".jpg";
//$("#p5jsimg").val(filename);

var mycanvas = document.getElementById('defaultCanvas0');
var canvasData = mycanvas.toDataURL();
var mytoken = document.getElementById("token").value;


$.ajax({
  url: '/saveImage',
  type: 'POST',
  data: {
    canvasData: canvasData,
    _token:mytoken,
    filename:filename,
  },
  success: function (file) {
    // window.location.href = "http://www.google.com/";
  //    alert("success");
  //  $("#mysavedcanvas").html("<a href='https://www.palaward.com/cards/" + file + "'>" + file + "</a>");

  },
  error: function (data, errorThrown)
  {
    //   alert('request failed : ' + errorThrown);
  }

});




}
