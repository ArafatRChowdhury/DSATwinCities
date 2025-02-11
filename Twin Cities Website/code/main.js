import Feature from 'ol/Feature.js';
import Map from 'ol/Map.js';
import Overlay from 'ol/Overlay.js';
import View from 'ol/View.js';
import Point from 'ol/geom/Point.js';
import TileLayer from 'ol/layer/Tile.js';
import VectorLayer from 'ol/layer/Vector.js';
import VectorSource from 'ol/source/Vector.js';
import Icon from 'ol/style/Icon.js';
import Style from 'ol/style/Style.js';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';
import { defaults as defaultInteractions } from 'ol/interaction';

//constants for the co ordinates of the cities and places of interest
const liverpoolCenter = fromLonLat([-2.983333, 53.400002]);
const rioDeJaneiroCenter = fromLonLat([-43.196388, -22.908333]);


//constants for the markers themselves - new features are created which sets a point at the co ordinates
const liverpool = new Feature({
  geometry: new Point(liverpoolCenter),
  name: 'Liverpool',
});

const rioDeJaneiro = new Feature({
  geometry: new Point(rioDeJaneiroCenter),
  name: 'Rio de Janeiro',
});

//how the markers look
const iconStyle = new Style({
  image: new Icon({
    anchor: [0.5, 46],
    anchorXUnits: 'fraction',
    anchorYUnits: 'pixels',
    src: 'icons/marker.png',
    scale: 0.25
  }),
});

liverpool.setStyle(iconStyle);
rioDeJaneiro.setStyle(iconStyle);

const vectorSource = new VectorSource({
  features: [liverpool, rioDeJaneiro],
});

const vectorLayer = new VectorLayer({
  source: vectorSource,
});

const map = new Map({
  layers: [
    new TileLayer({
      source: new OSM()
    }),
    vectorLayer,
    ],
  target: document.getElementById('map'),
  view: new View({
    center: liverpoolCenter,
    //minZoom: 15,
    //maxZoom: 15,
    zoom: 15,
  }),
  interactions: defaultInteractions({
    dragPan: false,
    doubleClickZoom: false,
    dragAndDrop: false,
    keyboardPan: false,
    keyboardZoom: false,
    mouseWheelZoom: false,
    pointer: false
  })
});

const element = document.getElementById('popup');

const popup = new Overlay({
  element: element,
  positioning: 'bottom-center',
  stopEvent: false,
});
map.addOverlay(popup);

let popover;
function disposePopover() {
  if (popover) {
    popover.dispose();
    popover = undefined;
  }
}
// display popup on click
map.on('click', function (evt) {
  const feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
    return feature;
  });
  disposePopover();
  if (!feature) {
    return;
  }
  popup.setPosition(evt.coordinate);
  popover = new bootstrap.Popover(element, {
    placement: 'top',
    html: true,
    content: feature.get('name'),
  });
  popover.show();
});

// change mouse cursor when over marker
map.on('pointermove', function (e) {
  const hit = map.hasFeatureAtPixel(e.pixel);
  map.getTarget().style.cursor = hit ? 'pointer' : '';
});
// Close the popup when the map is moved
map.on('movestart', disposePopover);

