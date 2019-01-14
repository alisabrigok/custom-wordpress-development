var MERCHANTS_API = '/stcApi/merchants';

var $languageContainer = $('#language-container');
var $contentContainer = $('#content-container');

var isRtlEnabled = localStorage.getItem('isRTL') && window.location.href.split('/').includes('ar');

if (isRtlEnabled) {
  $contentContainer.addClass('rtl');
  translateContent();
}

$languageContainer.on('click', function() {
  if (isRtlEnabled) {
    localStorage.setItem('isRTL', '');
    window.location.replace(window.location.origin);
  } else {
    localStorage.setItem('isRTL', 'true');
    window.location.replace(window.location.origin + "/ar");
  }
});

var $map = $('#map');

if ($map) {
  var map = new GMaps({
    div: '#map',
    lat: 24.759324,
    lng: 46.738326,
    zoom: 12,
    dragend: debounce(handleMapDrag, 500),
    'zoom_changed': debounce(handleMapDrag, 500),
  });

  function calculateDistance() {
    var northEast = map.getBounds().getNorthEast();
    var southWest = map.getBounds().getSouthWest();
    var distance = google.maps.geometry.spherical.computeDistanceBetween(northEast, southWest) / 2000;
    return distance;
  }

  function handleMapDrag(e) {
    var newMerchantsData = {
      latitude: e.center.lat(),
      longitude: e.center.lng(),
      distance: calculateDistance()
    }

    updateMerchantPins(newMerchantsData);
  }

  var markersArray = [];

  function clearMarkers() {
    if (markersArray.length) {
      for (var i = 0; i < markersArray.length; i++) {
        markersArray[i].setMap(null);
      }
      markersArray = [];
    }
  }
  
  function updateMerchantPins(merchantsData) {
    $.post(MERCHANTS_API, merchantsData, function(response) {
      clearMarkers();

      merchants = (response.items || []).forEach(merchant => {
        markersArray.push(
          map.addMarker({
            lat: merchant.address.latitude || '',
            lng: merchant.address.longitude || '',
            icon: {
              url: merchant.category.imageUrlPin || '',
              scaledSize: new google.maps.Size(34, 46)
            },
            infoWindow: {
              content: 
              `
                <div class="info__container">
                  <img src="${merchant.imageUrl || ''}" alt="merchant logo" class="info__logo"/>
                  <p class="info__title">${merchant.brandName}</p>
                  <p class="info__description">${merchant.category.desc}</p>
                </div>
              `
            }
          })
        );
      });
    }, 'json');
  }
  
  updateMerchantPins({
    latitude: 24.759324,
    longitude: 46.738326,
    distance: 10
  });
}

// i know this is a hack but for now no i18n configuration is set on the custom UI
function translateContent() {
  $('#language-switcher').text('English');
  $('#merchants-title').text('مواقع التجار');
  $('#filter-text').text('تصفية');
  $('#form-title').text('تسجيل التجار');
  $('#form-desc').text('أخبرنا عن الماركات التي ترغب انت تجدها على STC PAY NETWORK');
  $('#copyright-text').text('© 2019 المدفوعات الرقمية السعودية. جميع الحقوق محفوظة');
  $('#social-title').text('تابعنا');
  $('#app-title').text('حمل التطبيق');
  $('#form-ltr').hide();
  $('#form-rtl').show();
}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
}
