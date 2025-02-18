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
const liverpoolCenter = fromLonLat([-2.99, 53.40050]);
const liverpoolMountain = fromLonLat([-2.994611, 53.401065]);
const beatlesStatue = fromLonLat([-2.996435, 53.404513]);
const liverpoolMuseum = fromLonLat([-2.995577, 53.403483]);
const theBluecoat = fromLonLat([-2.983787, 53.404235]);
const maldronHotel = fromLonLat([-2.986259, 53.400578]);
const chavassePark = fromLonLat([-2.988920, 53.404077]);


const rioDeJaneiroCenter = fromLonLat([-43.196388, -22.958333]);
const maracanaStadium = fromLonLat([-43.230139, -22.912062]);
const museoDeAmanha = fromLonLat([-43.179587, -22.894384]);
const christTheRedeemer = fromLonLat([-43.209631, -22.951406]);
const sugarloafMountain = fromLonLat([-43.154546, -22.949299]);
const terraBrasilis = fromLonLat([-43.164847, -22.956182]);
const copacabanaPalace = fromLonLat([-43.178958, -22.967272]);


//constants for the markers themselves - new features are created which sets a point at the co ordinates

const liverpoolMuseumMarker = new Feature({
  geometry: new Point(liverpoolMuseum),
  name: 'Liverpool Museum',
});

const liverpoolMountainMarker = new Feature({
  geometry: new Point(liverpoolMountain),
  name: 'Liverpool Mountain',
});

const beatlesStatueMarker = new Feature({
  geometry: new Point(beatlesStatue),
  name: 'Beatles Statue',
});

const theBluecoatMarker = new Feature({
  geometry: new Point(theBluecoat),
  name: 'The Bluecoat',
});

const maldronHotelMarker = new Feature({
  geometry: new Point(maldronHotel),
  name: 'Maldron Hotel',
});

const chavasseParkMarker = new Feature({
  geometry: new Point(chavassePark),
  name: 'Chavasse Park',
});


const maracanaStadiumMarker = new Feature({
  geometry: new Point(maracanaStadium),
  name: 'maracanaStadium',
});

const museoDeAmanhaMarker = new Feature({
  geometry: new Point(museoDeAmanha),
  name: 'Museo de Amanha',
});

const christTheRedeemerMarker = new Feature({
  geometry: new Point(christTheRedeemer),
  name: 'Christ the Redeemer',
});

const sugarloafMountainMarker = new Feature({
  geometry: new Point(sugarloafMountain),
  name: 'Sugarloaf Mountain',
});

const terraBrasilisMarker = new Feature({
  geometry: new Point(terraBrasilis),
  name: 'Terra Brasilis',
});

const copacabanaPalaceMarker = new Feature({
  geometry: new Point(copacabanaPalace),
  name: 'Copacabana Palace',
});

//how the markers look
const iconStyle = new Style({
  image: new Icon({
    anchor: [0.5, 1],
    anchorXUnits: 'fraction',
    anchorYUnits: 'pixels',
    src: 'icons/marker.png',
    scale: 0.25
  }),
});


liverpoolMountainMarker.setStyle(iconStyle);
beatlesStatueMarker.setStyle(iconStyle);
liverpoolMuseumMarker.setStyle(iconStyle);
theBluecoatMarker.setStyle(iconStyle);
maldronHotelMarker.setStyle(iconStyle);
chavasseParkMarker.setStyle(iconStyle);

maracanaStadiumMarker.setStyle(iconStyle);
museoDeAmanhaMarker.setStyle(iconStyle);
christTheRedeemerMarker.setStyle(iconStyle);
sugarloafMountainMarker.setStyle(iconStyle);
terraBrasilisMarker.setStyle(iconStyle);
copacabanaPalaceMarker.setStyle(iconStyle);

const vectorSource = new VectorSource({
  features: [liverpoolMountainMarker, beatlesStatueMarker, liverpoolMuseumMarker, theBluecoatMarker, maldronHotelMarker, chavasseParkMarker,
  maracanaStadiumMarker, museoDeAmanhaMarker, christTheRedeemerMarker, sugarloafMountainMarker, terraBrasilisMarker, copacabanaPalaceMarker],
});

const vectorLayer = new VectorLayer({
  source: vectorSource,
});

const view = new View({
  center: [0, 0],
  zoom: 1,
});
//view is around 15 for liverpool, 12.5 for rio de janeiro

const map = new Map({
  layers: [
    new TileLayer({
      source: new OSM()
    }),
    vectorLayer,
    ],
  target: document.getElementById('map'),
  view: view,
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

const centerOnLiverpool = document.getElementById('centerOnLiverpool');
centerOnLiverpool.addEventListener(
  'click',
  function() {
    const size = map.getSize();
    view.setCenter(liverpoolCenter),
    view.setZoom(15)
  },
  false,
);

const centerOnRioDeJaneiro = document.getElementById('centerOnRioDeJaneiro');
centerOnRioDeJaneiro.addEventListener(
  'click',
  function() {
    const size = map.getSize();
    view.setCenter(rioDeJaneiroCenter),
    view.setZoom(12.5)
  },
  false,
);

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

