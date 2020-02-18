function preload(){
    var video = loadVideo("E:\\Videos\\World Live Code Loops\\YiroSlowMo.mp4");
}

function setup(){
  createCanvas(windowWidth,windowHeight - 5);
  background(30,30,30);
  video(video);
}

function draw(){
  strokeWeight(3);
  if(mouseIsPressed == true){
    line(mouseX,mouseY,pmouseX,pmouseY)
  }
}
