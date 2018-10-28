function setPanorama(div_id, url){
  alert("inside setPanorama");
  let div = document.getElementById(div_id); // can't seem to access element here..
  console.log(div.className);

  let params = {
    container: div,
    panorama: url
  };

  //return new PhotoSphereViewer(params);
}