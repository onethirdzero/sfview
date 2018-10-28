// THIS IS NOT WORKING!!
// do not expect setPanorama to do anything
// the problem lays in getting the word 'PhotoSphereViewer' recognized

import 'vendor/uevent.js';
import 'vendor/three.js';
import 'vendor/doT.js';
import 'vendor/D.js';
import {PhotoSphereViewer} from 'vendor/photo-sphere-viewer.js';

function setPanorama(div_id, url){
  alert("inside setPanorama");
  let div = document.getElementById(div_id);
  console.log(div.className);

  let params = {
    container: div,
    panorama: url
  };

  return new PhotoSphereViewer(params); // PhotoSphereViewer is not recognized
}