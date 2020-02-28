function preload(){
    var imagen = loadImage("SoundsOfTheWorld.png");
}

function setup(){
  createCanvas(windowWidth,windowHeight - 5);
  background(30,30,30);
}

function draw(){
  image(imagen,0,0);
  var colorPixel = imagen.get(mouseX,mouseY);
  fill(colorPixel);
  rect(50,50,50,50)
}
